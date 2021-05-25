<?php

namespace App\Http\Controllers\MedicalProgrammer;

use App\Models\MedicalProgrammer\MotherActivity;
use App\Models\MedicalProgrammer\ActivityType;
use App\Models\MedicalProgrammer\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $activities = Activity::all();
      return view('ehr.hetg.activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $motherActivities = MotherActivity::orderBy('description','ASC')->get();
      $activityTypes = ActivityType::orderBy('name','ASC')->get();

      return view('ehr.hetg.activities.create',compact('motherActivities','activityTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $activity = new Activity($request->All());
      //$activity->user_id = Auth::id();
      $activity->save();

      session()->flash('info', 'La actividad ha sido creada.');
      return redirect()->route('ehr.hetg.activities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
      $motherActivities = MotherActivity::orderBy('description','ASC')->get();
      $activityTypes = ActivityType::orderBy('name','ASC')->get();
      return view('ehr.hetg.activities.edit', compact('activity','motherActivities','activityTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        $activity->fill($request->all());
        //$activity->user_id = Auth::id();
        $activity->save();

        session()->flash('info', 'La actividad ha sido editada.');
        return redirect()->route('ehr.hetg.activities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
      $activity->delete();
      session()->flash('success', 'La actividad ha sido eliminada');
      return redirect()->route('ehr.hetg.activities.index');
    }
}
