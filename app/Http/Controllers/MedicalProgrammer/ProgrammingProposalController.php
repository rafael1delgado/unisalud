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
      if (Auth::user()->hasPermissionTo('Mp: Proposal - Jefe de CAE Médico') ||
          Auth::user()->hasPermissionTo('Mp: Proposal - Subdirección Médica')) {
        $programmingProposals = ProgrammingProposal::whereNotNull('specialty_id')->orderBy('id','DESC')->get();
      }elseif (Auth::user()->hasPermissionTo('Mp: Proposal - Jefe de CAE No médico') ||
               Auth::user()->hasPermissionTo('Mp: Proposal - Subdirección DGCP')) {
        $programmingProposals = ProgrammingProposal::whereNotNull('profession_id')->orderBy('id','DESC')->get();
      }else{
        $programmingProposals = ProgrammingProposal::orderBy('id','DESC')->get();
      }

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
      }elseif(Auth::user()->hasPermissionTo('Mp: Proposal - Subdirección DGCP')){
        $programmingProposalSignatureFlow->type = "Subdirección DGCP";
      }elseif(Auth::user()->hasPermissionTo('Mp: Proposal - Jefe de CAE Médico')){
        $programmingProposalSignatureFlow->type = "Jefatura CAE Médica";
      }elseif(Auth::user()->hasPermissionTo('Mp: Proposal - Jefe de CAE No médico')){
        $programmingProposalSignatureFlow->type = "Jefatura CAE No médica";
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
      $last_position = $programmingProposal->signatureFlows->last()->sign_position;

      $programmingProposalSignatureFlow = new ProgrammingProposalSignatureFlow();
      $programmingProposalSignatureFlow->programming_proposal_id = $programmingProposal->id;
      $programmingProposalSignatureFlow->user_id = Auth::id();
      $programmingProposalSignatureFlow->sign_position = $last_position + 1;
      $programmingProposalSignatureFlow->signature_date = Carbon::now();

      if ($request->has('accept_button')) {
        $programmingProposalSignatureFlow->status = "Solicitud confirmada";

        if (Auth::user()->hasPermissionTo('Mp: Proposal - Subdirección Médica') || Auth::user()->hasPermissionTo('Mp: Proposal - Subdirección DGCP')) {
          $programmingProposal->status = "Confirmado";
          $programmingProposal->save();
        }
        else{
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
      }elseif(Auth::user()->hasPermissionTo('Mp: Proposal - Subdirección DGCP')){
        $programmingProposalSignatureFlow->type = "Subdirección DGCP";
      }elseif(Auth::user()->hasPermissionTo('Mp: Proposal - Jefe de CAE Médico')){
        $programmingProposalSignatureFlow->type = "Jefatura CAE Médica";
      }elseif(Auth::user()->hasPermissionTo('Mp: Proposal - Jefe de CAE No médico')){
        $programmingProposalSignatureFlow->type = "Jefatura CAE No médica";
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

        // dd($programmed_days);

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

    public function consolidated_programmings(Request $request){
      // dd($request->start_date);

      $theoreticalProgrammings = null;
      $programmingProposals = null;
      $programmed_days = [];
      $array_medic_programmings = array();

      if ($request->date != null) {
          // if ($request->user_id != null) {

              $now = Carbon::now();
              $programmingProposals = ProgrammingProposal::when($request->specialty_id != null, function ($query) use ($request) {
                                                            $query->where('specialty_id',$request->specialty_id);
                                                        })
                                                        ->when($request->profession_id != null, function ($query) use ($request) {
                                                            $query->where('profession_id',$request->profession_id);
                                                        })
                                                        ->whereYear('request_date',$now->format('Y'))
                                                        ->where('status', 'Confirmado')
                                                        ->orderBy('user_id')
                                                        ->orderBy('request_date','ASC') //debe ir así, para que deje los primeros ingresados al principio, y aspi se puedan ordenar correctamente y no se pisen
                                                        ->get();

              $request_start_date = Carbon::parse($request->date)->startOfWeek();
              $request_end_date = Carbon::parse($request->date)->endOfWeek();

              // separa onthefly los días que se mostraran en fullcalendar
              $programmed_days = [];
              $count = 0;
              foreach ($programmingProposals as $key => $programmingProposal) {
                // ciclo para obtener fechas
                $start_date = $programmingProposal->start_date;
                $end_date = $programmingProposal->end_date;

                // se eliminan antiguos del array (periodos anteriores del ciclo) que se encuentren between de nueva iteración
                foreach ($programmed_days as $key2 => $programmed_day) {
                  foreach ($programmed_day as $key3 => $value) {
                    if (Carbon::parse($value['start_date'])->between($request_start_date, $request_end_date)) {
                      unset($programmed_days[$programmingProposal->user_id][$key3]);
                    }
                  }
                }

                //se obtienen los del periodo actual
                while ($start_date <= $end_date) {
                  $dayOfWeek = $start_date->dayOfWeek;
                  foreach ($programmingProposal->details->where('day',$dayOfWeek) as $key2 => $detail) {
                    //solo los que esten en el rango de fechas
                    if (Carbon::parse($start_date->format('Y-m-d'))->between($request_start_date, $request_end_date)) {
                      $programmed_days[$programmingProposal->user_id][$count]['start_date'] = $start_date->format('Y-m-d') . " " . $detail->start_hour;
                      $programmed_days[$programmingProposal->user_id][$count]['end_date'] = $start_date->format('Y-m-d') . " " . $detail->end_hour;
                      $programmed_days[$programmingProposal->user_id][$count]['data'] = $detail;
                      $count+=1;
                    }
                  }
                  $start_date->addDays(1);
                }
              }

              // se obtiene array final
              foreach ($programmed_days as $key => $programmed_day) {
                foreach ($programmed_day as $key => $value) {
                  // especialidades
                  if ($value['data']->programmingProposal->specialty) {
                    $array_medic_programmings[$value['data']->programmingProposal->user->OfficialFullName][$value['data']->programmingProposal->contract->contract_id]
                                            [$value['data']->programmingProposal->specialty->id_specialty . ' - ' . $value['data']->programmingProposal->specialty->specialty_name]
                                            [$value['data']->activity->id_activity . ' - ' . $value['data']->activity->activity_name]['hours'] = 0;

                    $array_medic_programmings[$value['data']->programmingProposal->user->OfficialFullName][$value['data']->programmingProposal->contract->contract_id]
                                            [$value['data']->programmingProposal->specialty->id_specialty . ' - ' . $value['data']->programmingProposal->specialty->specialty_name]
                                            [$value['data']->activity->id_activity . ' - ' . $value['data']->activity->activity_name]['performance'] = 0;
                  }
                  // profesiones
                  if ($value['data']->programmingProposal->profession) {
                    $array_medic_programmings[$value['data']->programmingProposal->user->OfficialFullName][$value['data']->programmingProposal->contract->contract_id]
                                            [$value['data']->programmingProposal->profession->id_profession . ' - ' . $value['data']->programmingProposal->profession->profession_name]
                                            [$value['data']->activity->id_activity . ' - ' . $value['data']->activity->activity_name]['hours'] = 0;

                    $array_medic_programmings[$value['data']->programmingProposal->user->OfficialFullName][$value['data']->programmingProposal->contract->contract_id]
                                            [$value['data']->programmingProposal->profession->id_profession . ' - ' . $value['data']->programmingProposal->profession->profession_name]
                                            [$value['data']->activity->id_activity . ' - ' . $value['data']->activity->activity_name]['performance'] = 0;
                  }
                }

                foreach ($programmed_day as $key => $value) {
                  // especialidades
                  if ($value['data']->programmingProposal->specialty) {
                    $start = Carbon::parse($value['start_date']);
                    $end = Carbon::parse($value['end_date']);
                    $array_medic_programmings[$value['data']->programmingProposal->user->OfficialFullName][$value['data']->programmingProposal->contract->contract_id]
                                            [$value['data']->programmingProposal->specialty->id_specialty . ' - ' . $value['data']->programmingProposal->specialty->specialty_name]
                                            [$value['data']->activity->id_activity . ' - ' . $value['data']->activity->activity_name]['hours'] += $start->diffInMinutes($end)/60;

                    $array_medic_programmings[$value['data']->programmingProposal->user->OfficialFullName][$value['data']->programmingProposal->contract->contract_id]
                                            [$value['data']->programmingProposal->specialty->id_specialty . ' - ' . $value['data']->programmingProposal->specialty->specialty_name]
                                            [$value['data']->activity->id_activity . ' - ' . $value['data']->activity->activity_name]['performance'] = $value['data']->activity->specialties->where('id',$value['data']->programmingProposal->specialty_id)->first()->pivot->performance;
                  }
                  // profesiones
                  if ($value['data']->programmingProposal->profession) {
                    $start = Carbon::parse($value['start_date']);
                    $end = Carbon::parse($value['end_date']);
                    $array_medic_programmings[$value['data']->programmingProposal->user->OfficialFullName][$value['data']->programmingProposal->contract->contract_id]
                                            [$value['data']->programmingProposal->profession->id_profession . ' - ' . $value['data']->programmingProposal->profession->profession_name]
                                            [$value['data']->activity->id_activity . ' - ' . $value['data']->activity->activity_name]['hours'] += $start->diffInMinutes($end)/60;

                    $array_medic_programmings[$value['data']->programmingProposal->user->OfficialFullName][$value['data']->programmingProposal->contract->contract_id]
                                            [$value['data']->programmingProposal->profession->id_profession . ' - ' . $value['data']->programmingProposal->profession->profession_name]
                                            [$value['data']->activity->id_activity . ' - ' . $value['data']->activity->activity_name]['performance'] = $value['data']->activity->professions->where('id',$value['data']->programmingProposal->profession_id)->first()->pivot->performance;
                  }
                }
              }
      }

      return view('medical_programmer.management.reports.consolidated_programmings',compact('array_medic_programmings'));
    }
}
