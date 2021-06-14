<?php

namespace App\Http\Controllers\Some;

use App\Http\Controllers\Controller;
use App\Models\MedicalProgrammer\TheoreticalProgramming;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('some.appointment');
    }

    public function openAgenda($from, $to)
    {
        $theoreticalProgramming = TheoreticalProgramming::query()
//            ->where('start_date', $from)
//            ->where('end_date', $to)

            ->get();

        dd($theoreticalProgramming);

    }
}
