<?php

namespace App\Http\Controllers\Some;

use App\Http\Controllers\Controller;
use App\Models\MedicalProgrammer\TheoreticalProgramming;
use App\Models\Some\Appointment;
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
        $start_date = Carbon::parse($request->from);
        $end_date = Carbon::parse($request->to);

        $programmingProposal = ProgrammingProposal::where('user_id',$request->user_id)
                                                  // ->where('contract_id',$programmingProposal->contract_id)
                                                  ->where('specialty_id',$request->specialty_id)
                                                  // ->where('id','<',$programmingProposal->id)
                                                  ->where('status', 'Confirmado')
                                                  ->latest()
                                                  ->first();

        $programmed_days = [];
        if ($programmingProposal != null) {
          $start_date = $start_date;
          $end_date = $end_date;
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
        }

        // dd($programmed_days);

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
        $programmingProposal = null;
        $programmed_days = [];

        if ($request) {
            if ($request->user_id != null) {

                $programmingProposal = ProgrammingProposal::where('user_id',$request->user_id)
                                                          // ->where('contract_id',$programmingProposal->contract_id)
                                                          ->where('specialty_id',$request->specialty_id)
                                                          ->where('status', 'Confirmado')
                                                          ->latest()
                                                          ->first();

                // ciclo para obtener fechas
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

            }
        }

        return view('some.open_tprogrammer', compact('request', 'programmingProposal','programmed_days'));
    }

    public function appointment_detail($id){
      $appointment = Appointment::find($id);
      // dd($appointment);
      return view('some.appointment_detail', compact('appointment'));
    }
}
