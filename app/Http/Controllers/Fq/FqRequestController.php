<?php

namespace App\Http\Controllers\Fq;

use App\Models\Fq\FqRequest;
use App\Models\Fq\ContactUser;
use App\Models\Fq\FqMedicine;
use App\Models\Fq\RequestFile;
use App\Models\User;
use App\Models\Practitioner;
use App\Models\ExtMedicine;
use App\Models\Surveys\TeleconsultationSurvey;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewNotification;
use App\Mail\AnswerNotification;
use Illuminate\Support\Facades\Storage;

class FqRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->can('Fq: admin')) {
            $practitioners = Practitioner::where('active', 1)->get();

            $pending_reqs = FqRequest::where('status', 'pending')
                ->latest()
                ->get();

            $reqs = FqRequest::whereIn('status', ['complete', 'rejected'])
                ->latest()
                ->paginate(15);

            return view('fq.request.index', compact('pending_reqs', 'reqs', 'practitioners'));
        }

        if (Auth::user()->can('Fq: answer request dispensing')) {
            $practitioners = Practitioner::where('active', 1)->get();
            $pending_reqs = FqRequest::where('status', 'pending')
                ->whereIn('name', ['dispensing'])
                ->latest()
                ->get();

            $reqs = FqRequest::whereIn('status', ['complete', 'rejected'])
                ->whereIn('name', ['dispensing'])
                ->latest()
                ->paginate(15);

            return view('fq.request.index', compact('pending_reqs', 'reqs', 'practitioners'));
        }
    }

    public function own_index()
    {
        if(ContactUser::getAmIContact() > 0){
            $my_reqs = FqRequest::where('contact_user_id', Auth::user()->id)
                ->latest()
                ->paginate(15);

            return view('fq.request.own_index', compact('my_reqs'));
        }
        else{
            return redirect()->route('fq.home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(ContactUser::getAmIContact() > 0){
            $ext_medicines = ExtMedicine::all();
            $contactUsers = ContactUser::where('user_id', Auth::user()->id)->get();
            return view('fq.request.create', compact('contactUsers', 'ext_medicines'));
        }
        else {
            return redirect()->route('fq.home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ContactUser $contactUser)
    {
        $fqRequest = new FqRequest($request->All());
        $fqRequest->contact_user_id = $contactUser->user->id;
        $fqRequest->patient_id = $request->patient_id;
        $fqRequest->status = 'pending';

        $fqRequest->save();

        if($request->hasFile('file')){
            //file
            foreach ($request->file as $key => $file) {
                $requestFile = new RequestFile();
                $now = Carbon::now()->format('Y_m_d_H_i_s');
                $requestFile->file_name = $now.'_disp_'.$fqRequest->id.'_'.$key;
                if($fqRequest->name == 'dispensing'){
                    $requestFile->file_path = $file->storeAs('/unisalud/fq/disp/', $requestFile->file_name.'.'.$file->extension(), 'gcs');
                }
                if($fqRequest->name == 'exam request'){
                    $requestFile->file_path = $file->storeAs('/unisalud/fq/exam/', $requestFile->file_name.'.'.$file->extension(), 'gcs');
                }
                $requestFile->request_id = $fqRequest->id;
                $requestFile->save();
            }
        }
        if($fqRequest->name == 'dispensing' && $request->medicines){
            foreach ($request->medicines as $key => $medicine_name) {
                $fq_medicine = new FqMedicine();
                $fq_medicine->request_id = $fqRequest->id;
                $fq_medicine->medicines_id = $medicine_name;
                $fq_medicine->save();
            }
        }

        if($fqRequest->name == 'dispensing'){
            Mail::to(explode(',', env('APP_FQ_REFERENCE_DISP')))->send(new NewNotification($fqRequest));
        }
        else{
            Mail::to(explode(',', env('APP_FQ_REFERENCE')))->send(new NewNotification($fqRequest));
        }

        session()->flash('success', 'Se ha creado la solicitud exitosamente');
        return redirect()->route('fq.request.own_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fq\FqRequest  $fqRequest
     * @return \Illuminate\Http\Response
     */
    public function show(FqRequest $fqRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fq\FqRequest  $fqRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(FqRequest $fqRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fq\FqRequest  $fqRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FqRequest $fqRequest)
    {
        $fqRequest->fill($request->all());
        $fqRequest->status = 'complete';
        $fqRequest->date_confirm_record = Carbon::now();
        $fqRequest->user_id = Auth()->user()->id;

        $fqRequest->save();

        foreach($fqRequest->contactUser->contactPoints->where('system', 'email') as $contactPoint){
            $send_to[] = $contactPoint->value;
        }

        // if (env('APP_ENV') == 'production') {
            if($fqRequest->name == 'dispensing'){
                Mail::to($send_to)
                    ->cc(explode(',', env('APP_FQ_REFERENCE_DISP')))
                    ->send(new AnswerNotification($fqRequest));
            }
            else{
                Mail::to($send_to)
                    ->cc(explode(',', env('APP_FQ_REFERENCE')))
                    ->send(new AnswerNotification($fqRequest));
            }
        // }

        session()->flash('success', 'La solicitud fue correctamente atendida.');
        return redirect()->route('fq.request.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fq\FqRequest  $fqRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(FqRequest $fqRequest)
    {
        //
    }

    public function view_file(RequestFile $requestFile)
    {
        return Storage::disk('gcs')->response($requestFile->file_path);
    }
}
