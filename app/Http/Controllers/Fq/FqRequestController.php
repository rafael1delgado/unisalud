<?php

namespace App\Http\Controllers\Fq;

use App\Models\Fq\FqRequest;
use App\Models\Fq\ContactUser;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewNotification;
use App\Mail\AnswerNotification;

class FqRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Request General */
        $pending_reqs = FqRequest::where('status', 'pending')
            ->latest()
            ->get();

        $reqs = FqRequest::whereIn('status', ['complete', 'rejected'])
            ->latest()
            ->paginate(15);
        /* --------------- */

        /* Request Medicines */
        $pending_reqs_medicines = FqRequest::where('status', 'pending')
            ->whereIn('name', ['medicines'])
            ->latest()
            ->get();

        $reqs_medicines = FqRequest::whereIn('status', ['complete', 'rejected'])
            ->whereIn('name', ['medicines'])
            ->latest()
            ->paginate(15);
        /* ----------------- */

        return view('fq.request.index', compact('pending_reqs', 'reqs',
                                                'pending_reqs_medicines', 'reqs_medicines'));
    }

    public function own_index()
    {
        $my_reqs = FqRequest::where('contact_user_id', Auth::user()->id)
            ->latest()
            ->get();

        return view('fq.request.own_index', compact('my_reqs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contactUsers = ContactUser::where('user_id', Auth::user()->id)->get();
        return view('fq.request.create', compact('contactUsers'));
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


        // if (env('APP_ENV') == 'production') {
        //     if($fqRequest->name == 'medicines'){
        //         Mail::to(['valentina.andradea@redsalud.gob.cl'])->cc(['diego.leyton@redsalud.gob.cl', 'ana.mujica@redsalud.gob.cl'])->send(new NewNotification($fqRequest));
        //     }
        //     else{
        //         Mail::to(['ana.mujica@redsalud.gob.cl'])->send(new NewNotification($fqRequest));
        //     }
        // // }

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
        $fqRequest->user_id = Auth()->user()->id;
        $fqRequest->date_confirm_record = Carbon::now();
        $fqRequest->save();

        // if (env('APP_ENV') == 'production') {
            if($fqRequest->name == 'medicines'){
                Mail::to($fqRequest->contactUser->email)
                    ->cc(['valentina.andradea@redsalud.gob.cl',
                          'diego.leyton@redsalud.gob.cl',
                          'ana.mujica@redsalud.gob.cl'])
                    ->send(new AnswerNotification($fqRequest));
            }
            else{
                Mail::to($fqRequest->contactUser->email)
                    ->cc(['ana.mujica@redsalud.gob.cl'])
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
}
