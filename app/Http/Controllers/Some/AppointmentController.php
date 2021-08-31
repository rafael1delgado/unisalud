<?php

namespace App\Http\Controllers\Some;

use App\Http\Controllers\Controller;
use App\Models\MedicalProgrammer\TheoreticalProgramming;
use App\Models\Some\Appointment;
use App\Models\Absence;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use App\Models\MedicalProgrammer\ProgrammingProposal;
use App\Models\User;

class AppointmentController extends Controller
{
    public function index($appointmentId)
    {
        return view('some.appointment', compact('appointmentId'));
    }

    /**
     * Descompone las programaciones en appointments
     * @param Request $request
     * @return Application|Factory|View
     */
    public function openAgenda(Request $request)
    {
        $request_start_date = Carbon::parse($request->from);
        $request_end_date = Carbon::parse($request->to);

        $now = Carbon::now();
        $programmingProposals = ProgrammingProposal::where('user_id',$request->user_id)
                                                  // ->where('contract_id',$programmingProposal->contract_id)
                                                  ->when($request->specialty_id != null, function ($query) use ($request) {
                                                      $query->where('specialty_id',$request->specialty_id);
                                                  })
                                                  ->when($request->profession_id != null, function ($query) use ($request) {
                                                      $query->where('profession_id',$request->profession_id);
                                                  })
                                                  // ->where('id','<',$programmingProposal->id)
                                                  // ->whereBetween('start_date',[$request_start_date,$request_end_date])
                                                  // ->whereBetween('end_date',[$request_start_date,$request_end_date])
                                                  ->whereYear('request_date',$now->format('Y'))
                                                  ->where('status', 'Confirmado')
                                                  // ->latest()
                                                  // ->first();
                                                  ->orderBy('request_date','ASC') //debe ir así, para que deje los primeros ingresados al principio, y aspi se puedan ordenar correctamente y no se pisen
                                                  ->get();

                                                  // dd($programmingProposals);

        //se obtiene ausencias programadas
        $absences = Absence::where('user_id',$request->user_id)->get();
        // dd($absences);

        // obtiene todos los horarios para cita
        $programmed_days = [];
        $count = 0;
        foreach ($programmingProposals as $key => $programmingProposal) {
          if ($programmingProposal != null) {

            $start_date = $programmingProposal->start_date;
            $end_date = $programmingProposal->end_date;

            // se eliminan antiguos del array (periodos anteriores del ciclo) que se encuentren between de nueva iteración
            foreach ($programmed_days as $key2 => $programmed_day) {
              if (Carbon::parse($programmed_day['start_date'])->between($start_date, $end_date)) {
                unset($programmed_days[$key2]);
              }
            }

            //se obtienen los del periodo actual
            while ($start_date <= $end_date) {
              $dayOfWeek = $start_date->dayOfWeek;

              foreach ($programmingProposal->details->where('day',$dayOfWeek) as $key3 => $detail) {
                //no se consideran los que no tengan performance
                if ($detail->activity->performance != 0) {

                  $start = Carbon::parse($start_date->format('Y-m-d') . " " . $detail->start_hour);
                  // print_r($detail->appointments->where('start',$start)->count());
                  //no se consideran los que ya están aperturados
                  if ($detail->appointments->where('start',$start)->count() == 0) {
                    $programmed_days[$count]['start_date'] = $start_date->format('Y-m-d') . " " . $detail->start_hour;
                    $programmed_days[$count]['end_date'] = $start_date->format('Y-m-d') . " " . $detail->end_hour;
                    $programmed_days[$count]['data'] = $detail;
                    $count+=1;
                  }

                }
              }
              $start_date->addDays(1);
            }
          }
        }


        //se eliminan los que no corresponden
        foreach ($programmed_days as $key => $programmed_day) {
          // dd($programmed_day);
          $start_date = Carbon::parse($programmed_day['start_date']);
          $end_date = Carbon::parse($programmed_day['end_date']);

          //se dejan solo los que esten en el rango de fechas del request
          if (!$start_date->isBetween($request_start_date,$request_end_date)) {
            unset($programmed_days[$key]);
          }
        }

        // dd($programmed_days);
        // dd($absences);

        // $appointments = new Collection();
        foreach ($programmed_days as $programmed_day) {
            $startDateTheoretical = Carbon::parse($programmed_day['start_date']);
            $endDateTheoretical = Carbon::parse($programmed_day['end_date']);
            $diffMinutesTheoretical = $endDateTheoretical->diffInMinutes($startDateTheoretical);

            if ($programmed_day['data']->subactivity) {
                $period = 60 / $programmed_day['data']->subactivity->performance;
            } else {
                $period = 60 / $programmed_day['data']->activity->performance;
            }
            $qntAppointments = $diffMinutesTheoretical / $period;

            $lastDate = $startDateTheoretical->copy();
            for ($i = 0; $i < $qntAppointments; $i++) {

                foreach ($absences as $key => $absence) {
                  // si no está entre ausencias, se ingresa
                  if (!$lastDate->copy()->between($absence->start_date, $absence->end_date)) {

                    //se crea nueva cita
                    $newAppointment = new Appointment;
                    $newAppointment->start = $lastDate->copy();
                    $newAppointment->end = $lastDate->addMinutes($period);
                    $newAppointment->status = 'proposed';
                    // $newAppointment->mp_theoretical_programming_id = $theoreticalProgramming->id;
                    $newAppointment->mp_prog_prop_detail_id = $programmed_day['data']->id;
                    $newAppointment->created = now();
                    $newAppointment->cod_con_appointment_type_id = 4;
                    $newAppointment->save();

                    //asociar en tabla appointables
                    $user = User::find($request->user_id);
                    $practitioner = $user->practitioners()->where('organization_id',4)->where('specialty_id',$request->specialty_id)->first();
                    $newAppointment->practitioners()->save($practitioner, ['required' => 'required', 'status' => 'tentative']);
                  }
                }

            }
        }

        return redirect()->route('some.agenda', ['type'=>$request->type,
                                                 'specialty_id'=>$request->specialty_id,
                                                 'profession_id'=>$request->profession_id,
                                                 'user_id'=>$request->user_id]);
    }

    public function agenda(Request $request){
      $user_id = $request->get('user_id');
      $appointments = Appointment::where('id',0)->get();
      $user = User::find($user_id);
      if ($user != null) {
        if ($user->practitioners()->count() > 0) {
          $practitioner = $user->practitioners()->where('organization_id',4)
                                                ->where('specialty_id',$request->specialty_id)
                                                ->first();

          $appointments = $practitioner->appointments()->get();
        }
      }

      return view('some.agenda', compact('appointments','request'));
    }

    public function openTProgrammerView(Request $request)
    {
        $theoreticalProgrammings = null;
        $programmingProposals = null;
        $programmed_days = [];
        $absences = Absence::where('id',0)->get();

        if ($request) {
            if ($request->user_id != null) {

                $now = Carbon::now();
                $programmingProposals = ProgrammingProposal::where('user_id',$request->user_id)
                                                          // ->where('contract_id',$programmingProposal->contract_id)
                                                          ->when($request->specialty_id != null, function ($query) use ($request) {
                                                              $query->where('specialty_id',$request->specialty_id);
                                                          })
                                                          ->when($request->profession_id != null, function ($query) use ($request) {
                                                              $query->where('profession_id',$request->profession_id);
                                                          })
                                                          ->whereYear('request_date',$now->format('Y'))
                                                          ->where('status', 'Confirmado')
                                                          // ->latest()
                                                          // ->first();
                                                          ->orderBy('request_date','ASC') //debe ir así, para que deje los primeros ingresados al principio, y aspi se puedan ordenar correctamente y no se pisen
                                                          ->get();

                                                          // dd($programmingProposals);

                $absences = Absence::where('user_id',$request->user_id)->get();

                foreach ($absences as $key => $absence) {
                  $absence->start = $absence->start_date->format('Y-m-d') . " 00:00:00";
                  $absence->end = $absence->end_date->format('Y-m-d') . " 23:59:59";
                  $absence->title = $absence->type;
                  $absence->color = "#F5B7B1";
                  $absence->editable = false;
                }

                // separa onthefly los días que se mostraran en fullcalendar
                $programmed_days = [];
                $count = 0;
                foreach ($programmingProposals as $key => $programmingProposal) {
                  // ciclo para obtener fechas
                  $start_date = $programmingProposal->start_date;
                  $end_date = $programmingProposal->end_date;

                  // se eliminan antiguos del array (periodos anteriores del ciclo) que se encuentren between de nueva iteración
                  foreach ($programmed_days as $key => $programmed_day) {
                    if (Carbon::parse($programmed_day['start_date'])->between($start_date, $end_date)) {
                      unset($programmed_days[$key]);
                    }
                  }

                  //se obtienen los del periodo actual
                  while ($start_date <= $end_date) {
                    $dayOfWeek = $start_date->dayOfWeek;
                    foreach ($programmingProposal->details->where('day',$dayOfWeek) as $key2 => $detail) {
                      //que tengan performance
                      if ($detail->activity->performance != 0) {
                        $programmed_days[$count]['start_date'] = $start_date->format('Y-m-d') . " " . $detail->start_hour;
                        $programmed_days[$count]['end_date'] = $start_date->format('Y-m-d') . " " . $detail->end_hour;
                        $programmed_days[$count]['data'] = $detail;
                        // verifia si está aperturado o no
                        $start = Carbon::parse($start_date->format('Y-m-d') . " " . $detail->start_hour);
                        if ($detail->appointments->where('start',$start)->count() > 0) {
                          $programmed_days[$count]['color'] = "ABEBC6"; //aperturados
                        }else{
                          $programmed_days[$count]['color'] = "85C1E9";
                        }
                        $count+=1;
                      }
                    }
                    $start_date->addDays(1);
                  }
                }
            }
        }

        return view('some.open_tprogrammer', compact('request', 'programmingProposals','programmed_days','absences'));
    }

    public function appointment_detail($id){
      $appointment = Appointment::find($id);
      // dd($appointment);
      return view('some.appointment_detail', compact('appointment'));
    }
}
