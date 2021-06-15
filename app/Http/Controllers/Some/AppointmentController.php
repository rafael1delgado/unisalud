<?php

namespace App\Http\Controllers\Some;

use App\Http\Controllers\Controller;
use App\Models\MedicalProgrammer\TheoreticalProgramming;
use App\Models\Some\Appointment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('some.appointment');
    }

//    public function openAgenda()
    public function openAgenda(Request $request)
    {
        $start_date = $request->from;
        $end_date = $request->to;

        $theoreticalProgrammings = TheoreticalProgramming::query()
            ->whereDate('start_date', '>=', $start_date)
            ->whereDate('end_date', '<=', $end_date)
            ->get();

        foreach ($theoreticalProgrammings as $theoreticalProgramming) {
            $startDate = Carbon::parse($theoreticalProgramming->start_date);

            if ($theoreticalProgramming->subactivity) {
                $period = 60 / $theoreticalProgramming->subactivity->performance;
            }else{
                $period = 60 / $theoreticalProgramming->performance;
            }

            for ($i = 0; $i < $theoreticalProgramming->performance; $i++) {
                $newAppointment = new Appointment;
                if ($i === 0) {
                    $newAppointment->start = $theoreticalProgramming->start_date;
                } else {
                    $newAppointment->start = $startDate->addMinutes($period);
                }
                $newAppointment->status = 'proposed';
                $newAppointment->mp_theoretical_programming_id = $theoreticalProgramming->id;
                $newAppointment->save();
            }
        }

        return view('some.agenda');
    }

    public function openTProgrammerView(Request $request){
      $theoreticalProgrammings = null;

      if($request){
        if ($request->user_id != null) {
          // $monday = Carbon::parse($request->date)->startOfWeek();
          // $sunday = Carbon::parse($request->date)->endOfWeek();
          $theoreticalProgrammings = TheoreticalProgramming::where('user_id',$request->user_id)
                                                           // ->whereBetween('start_date',[$monday,$sunday])
                                                           ->get();
                                                           // dd($request->user_id, $theoreticalProgrammings);
        }
      }

      return view('some.open_tprogrammer',compact('request','theoreticalProgrammings'));
    }
}
