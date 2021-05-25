<?php

namespace App\Http\Controllers\MedicalProgrammer;

use App\Models\MedicalProgrammer\ExecutedActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExecutedActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $executedActivities = ExecutedActivity::All();
        return view('medical_programmer.executed_activities.index',compact('executedActivities'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
}
