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
        $start_date = $request->from;
        $end_date = $request->to;

        $theoreticalProgrammings = TheoreticalProgramming::query()
            ->whereDate('start_date', '>=', $start_date)
            ->whereDate('end_date', '<=', $end_date)
            ->whereNotNull('performance')
            ->where('user_id',$request->user_id)
            ->whereDoesntHave('appointments')
            ->get();

        // $appointments = new Collection();
        foreach ($theoreticalProgrammings as $theoreticalProgramming) {
            $startDateTheoretical = Carbon::parse($theoreticalProgramming->start_date);
            $endDateTheoretical = Carbon::parse($theoreticalProgramming->end_date);
            $diffMinutesTheoretical = $endDateTheoretical->diffInMinutes($startDateTheoretical);

            if ($theoreticalProgramming->subactivity) {
                $period = 60 / $theoreticalProgramming->subactivity->performance;
            } else {
                $period = 60 / $theoreticalProgramming->performance;
            }
            $qntAppointments = $diffMinutesTheoretical / $period;

            $lastDate = $startDateTheoretical->copy();
            for ($i = 0; $i < $qntAppointments; $i++) {
                $newAppointment = new Appointment;
                $newAppointment->start = $lastDate->copy();
                $newAppointment->end = $lastDate->addMinutes($period);
                $newAppointment->status = 'proposed';
                $newAppointment->mp_theoretical_programming_id = $theoreticalProgramming->id;
                $newAppointment->created = now();
                $newAppointment->cod_con_appointment_type_id = 4;
                $newAppointment->save();
                // $appointments->push($newAppointment);
            }
        }

        // $appointments = Appointment::all();
        return redirect()->route('some.agenda', ['type'=>$request->type,
                                                 'specialty_id'=>$request->specialty_id,
                                                 'profession_id'=>$request->profession_id,
                                                 'user_id'=>$request->user_id]);
        // return view('some.agenda', compact('start_date', 'end_date', 'appointments'));
    }

    public function agenda(Request $request){
      $user_id = $request->get('user_id');
      $appointments = Appointment::whereHas('theoreticalProgramming', function ($query) use ($user_id) {
                                      return $query->where('user_id',$user_id);
                                   })->get();

      // foreach ($appointments as $key => $appointment) {
      //   if ($appointment->status == "booked") {
      //       dd($appointment->appointables);
      //   }
      // }
      return view('some.agenda', compact('appointments','request'));
    }

    public function openTProgrammerView(Request $request)
    {
        $theoreticalProgrammings = null;

        if ($request) {
            if ($request->user_id != null) {
                // $monday = Carbon::parse($request->date)->startOfWeek();
                // $sunday = Carbon::parse($request->date)->endOfWeek();
                $theoreticalProgrammings = TheoreticalProgramming::where('user_id', $request->user_id)
                    // ->whereBetween('start_date',[$monday,$sunday])
                    ->get();
                // dd($request->user_id, $theoreticalProgrammings);
            }
        }

        return view('some.open_tprogrammer', compact('request', 'theoreticalProgrammings'));
    }

    public function appointment_detail($id){
      $appointment = Appointment::find($id);
      return view('some.appointment_detail', compact('appointment'));
    }
}
