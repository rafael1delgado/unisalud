<?php

namespace App\Http\Controllers\Surveys;

use App\Models\Surveys\TeleconsultationSurvey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TeleconsultationSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teleconsultationSurveys = TeleconsultationSurvey::latest()
        ->paginate(10);
        return view('surveys.teleconsultation_survey.index', compact('teleconsultationSurveys'));
    }

    public function own_index()
    {
        $teleconsultationSurveys = TeleconsultationSurvey::where('user_id', Auth::user()->id)
          ->latest()
          ->paginate(10);

        return view('surveys.teleconsultation_survey.index', compact('teleconsultationSurveys'));
    }

    public function my_survey(TeleconsultationSurvey $teleconsultationSurvey)
    {
        $teleconsultationSurvey = TeleconsultationSurvey::where('user_id', Auth::user()->id)->first();

        return view('surveys.teleconsultation_survey.my_survey', compact('teleconsultationSurvey'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surveys.teleconsultation_survey.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teleconsultationSurvey = new TeleconsultationSurvey($request->All());
        $teleconsultationSurvey->user_id = Auth::user()->id;

        $teleconsultationSurvey->save();

        return redirect()->route('surveys.teleconsultation.own_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeleconsultationSurvey  $teleconsultationSurvey
     * @return \Illuminate\Http\Response
     */
    public function show(TeleconsultationSurvey $teleconsultationSurvey)
    {
        return view('surveys.teleconsultation_survey.show', compact('teleconsultationSurvey'));
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
