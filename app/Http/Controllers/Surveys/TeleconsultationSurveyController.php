<?php

namespace App\Http\Controllers\Surveys;

use App\Models\TeleconsultationSurvey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeleconsultationSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surveys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeleconsultationSurvey  $teleconsultationSurvey
     * @return \Illuminate\Http\Response
     */
    public function show(TeleconsultationSurvey $teleconsultationSurvey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeleconsultationSurvey  $teleconsultationSurvey
     * @return \Illuminate\Http\Response
     */
    public function edit(TeleconsultationSurvey $teleconsultationSurvey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeleconsultationSurvey  $teleconsultationSurvey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeleconsultationSurvey $teleconsultationSurvey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeleconsultationSurvey  $teleconsultationSurvey
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeleconsultationSurvey $teleconsultationSurvey)
    {
        //
    }
}
