<?php

namespace App\Http\Controllers\Some;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('some.appointment');
    }


    public function openAgenda($from, $to)
    {

    }
}
