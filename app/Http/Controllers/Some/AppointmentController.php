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
    public function openAgenda()
    {
        $start_date = Carbon::parse('14-06-2021');
        $end_date = Carbon::parse('18-06-2021');

        $theoreticalProgrammings = TheoreticalProgramming::query()
            ->where('start_date', '>=', $start_date)
            ->where('end_date', '<=', $end_date)
            ->get();

        foreach ($theoreticalProgrammings as $theoreticalProgramming) {
            $startDate = Carbon::parse($theoreticalProgramming->start_date);
            $period = 60 / $theoreticalProgramming->performance;

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
}
