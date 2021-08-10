<?php

namespace App\Http\Controllers\MedicalProgrammer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\MedicalProgrammer\ProgrammingProposal;
use App\Models\MedicalProgrammer\ProgrammingProposalDetail;
use App\Models\MedicalProgrammer\ProgrammingProposalSignatureFlow;
// use App\Models\MedicalProgrammer\TheoreticalProgramming;

use App\Models\User;

class ProgrammingProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programmingProposals = ProgrammingProposal::all();
        return view('medical_programmer.programming_proposals.index',compact('programmingProposals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('medical_programmer.programming_proposals.create',compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $programmingProposal = new ProgrammingProposal($request->All());
      $programmingProposal->type = $request->proposal_type;
      $programmingProposal->request_date = Carbon::now();
      $programmingProposal->status = "Creado";
      $programmingProposal->save();

      $programmingProposalSignatureFlow = new ProgrammingProposalSignatureFlow();
      $programmingProposalSignatureFlow->programming_proposal_id = $programmingProposal->id;
      $programmingProposalSignatureFlow->user_id = Auth::id();
      $programmingProposalSignatureFlow->sign_position = 1;
      $programmingProposalSignatureFlow->signature_date = Carbon::now();
      $programmingProposalSignatureFlow->status = "Solicitud creada";

      if (Auth::user()->hasPermissionTo('Mp: Proposal - Subdirección Médica')) {
        $programmingProposalSignatureFlow->type = "Subdirección Médica";
      }elseif(Auth::user()->hasPermissionTo('Mp: Proposal - Jefe de Servicio')){
        $programmingProposalSignatureFlow->type = "Jefe de Servicio";
      }else{
        $programmingProposalSignatureFlow->type = "Funcionario";
      }

      $programmingProposalSignatureFlow->save();

      session()->flash('success', 'Se ha registrado la información.');
      return redirect()->route('medical_programmer.programming_proposal.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_confirmation(Request $request, ProgrammingProposal $programmingProposal)
    {
      $programmingProposalSignatureFlow = new ProgrammingProposalSignatureFlow();
      $programmingProposalSignatureFlow->programming_proposal_id = $programmingProposal->id;
      $programmingProposalSignatureFlow->user_id = Auth::id();
      $programmingProposalSignatureFlow->sign_position = 2;
      $programmingProposalSignatureFlow->signature_date = Carbon::now();

      if ($request->has('accept_button')) {
        $programmingProposalSignatureFlow->status = "Solicitud confirmada";

        if (Auth::user()->hasPermissionTo('Mp: Proposal - Subdirección Médica')) {
          $programmingProposal->status = "Confirmado";
          $programmingProposal->save();
        }elseif(Auth::user()->hasPermissionTo('Mp: Proposal - Jefe de Servicio')){
          $programmingProposal->status = "En proceso";
          $programmingProposal->save();
        }else{
          $programmingProposal->status = "En proceso";
          $programmingProposal->save();
        }
      }
      else{
        $programmingProposalSignatureFlow->status = "Solicitud rechazada";

        $programmingProposal->status = "Rechazado";
        $programmingProposal->save();
      }

      if (Auth::user()->hasPermissionTo('Mp: Proposal - Subdirección Médica')) {
        $programmingProposalSignatureFlow->type = "Subdirección Médica";
      }elseif(Auth::user()->hasPermissionTo('Mp: Proposal - Jefe de Servicio')){
        $programmingProposalSignatureFlow->type = "Jefe de Servicio";
      }else{
        $programmingProposalSignatureFlow->type = "Funcionario";
      }

      $programmingProposalSignatureFlow->observation = $request->observation;
      $programmingProposalSignatureFlow->save();

      session()->flash('success', 'Se ha registrado la información.');
      return redirect()->route('medical_programmer.programming_proposal.edit', $programmingProposal);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgrammingProposal $programmingProposal)
    {
        //obtiene detalles ingresados para mostrarlos en jcalendar
        $start_date = $programmingProposal->start_date;
        $end_date = $programmingProposal->end_date;
        $programmed_days = [];
        $count = 0;

        while ($start_date <= $end_date) {
          $dayOfWeek = $start_date->dayOfWeek;

          foreach ($programmingProposal->details->where('day',$dayOfWeek) as $key => $detail) {
            $programmed_days[$count]['start_date'] = $start_date->format('Y-m-d') . " " . $detail->start_hour;
            $programmed_days[$count]['end_date'] = $start_date->format('Y-m-d') . " " . $detail->end_hour;
            $programmed_days[$count]['data'] = $detail;
            $count+=1;
          }
          $start_date->addDays(1);
        }

        $total_hours = 0;
        foreach ($programmingProposal->details as $key => $detail) {
          $total_hours += Carbon::parse($detail->end_hour)->diffInMinutes(Carbon::parse($detail->start_hour))/60;
        }

        //obtiene teoricos para mostrar en jcalendar

        // $theoreticalProgrammings = TheoreticalProgramming::where('user_id',$programmingProposal->user_id)
        //                                                  ->where('contract_id',$programmingProposal->contract_id)
        //                                                  ->where('specialty_id',$programmingProposal->specialty_id)
        //                                                  ->whereBetween('start_date',[$programmingProposal->start_date,$programmingProposal->end_date])
        //                                                  ->get();

        // obtiene posibles programaciones anteriores para comparación
        $last_programmingProposal = ProgrammingProposal::where('user_id',$programmingProposal->user_id)
                                                       ->where('contract_id',$programmingProposal->contract_id)
                                                       ->where('specialty_id',$programmingProposal->specialty_id)
                                                       ->where('id','<',$programmingProposal->id)
                                                       ->where('status', 'Confirmado')
                                                       ->latest()->first();

       $last_programmed_days = [];
       if ($last_programmingProposal != null) {
         $start_date = $last_programmingProposal->start_date;
         $end_date = $last_programmingProposal->end_date;
         $count = 0;

         while ($start_date <= $end_date) {
           $dayOfWeek = $start_date->dayOfWeek;

           foreach ($last_programmingProposal->details->where('day',$dayOfWeek) as $key => $detail) {
             $last_programmed_days[$count]['start_date'] = $start_date->format('Y-m-d') . " " . $detail->start_hour;
             $last_programmed_days[$count]['end_date'] = $start_date->format('Y-m-d') . " " . $detail->end_hour;
             $last_programmed_days[$count]['data'] = $detail;
             $count+=1;
           }
           $start_date->addDays(1);
         }
       }

        return view('medical_programmer.programming_proposals.edit', compact('programmingProposal','last_programmed_days','programmed_days','total_hours'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgrammingProposal $programmingProposal)
    {
        $programmingProposal->delete();
        session()->flash('success', 'Se ha eliminado la información.');
        return redirect()->route('medical_programmer.programming_proposal.index');
    }

    public function programming_by_practioner(Request $request)
    {
      $user_id = $request->get('user_id');
      $user = User::find($user_id);
      $programmingProposals = ProgrammingProposal::where('id',0)->get();
      if ($user != null) {

        $now = Carbon::now();
        $programmingProposals = ProgrammingProposal::where('user_id',$request->user_id)
                                                  // ->where('contract_id',$programmingProposal->contract_id)
                                                  ->where('specialty_id',$request->specialty_id)
                                                  ->where('status', 'Confirmado')
                                                  ->whereYear('request_date',$now->format('Y'))
                                                  ->get();


        foreach ($programmingProposals as $key => $programmingProposal) {
          $array = array();
          foreach ($programmingProposal->details as $key => $detail) {
            if($detail->subactivity) {
              $array[$detail->activity->activity_name . " - " . $detail->subactivity->sub_activity_name] = 0;
            }else{
              $array[$detail->activity->activity_name] = 0;
            }
          }
          foreach ($programmingProposal->details as $key => $detail) {
            if($detail->subactivity) {
              $array[$detail->activity->activity_name . " - " . $detail->subactivity->sub_activity_name] += Carbon::parse($detail->end_hour)->diffInMinutes(Carbon::parse($detail->start_hour))/60;
            }else{
              $array[$detail->activity->activity_name] += Carbon::parse($detail->end_hour)->diffInMinutes(Carbon::parse($detail->start_hour))/60;
            }
          }
          $programmingProposal->array = $array;
        }

        // dd($programmingProposals->first()->details);
      }

      return view('some.programming_by_practioner',compact('request','programmingProposals'));
    }
}
