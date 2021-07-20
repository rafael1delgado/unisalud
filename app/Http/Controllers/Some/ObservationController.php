<?php

namespace App\Http\Controllers\Some;

use App\Models\Observation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ObservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $observations = Observation::all();
      return view('some.observations.index', compact('observations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('some.observations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $observation = new Observation($request->All());
      //$Observation->user_id = Auth::id();
      $observation->save();

      session()->flash('info', 'La observacion ha sido creada.');
      return redirect()->route('some.observations.index');
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
    public function edit(Observation $observation)
    {
        return view('some.observations.edit', compact('observation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Observation $observation)
    {
      $observation->fill($request->all());
      //$Observation->user_id = Auth::id();
      $observation->save();

      session()->flash('info', 'La observacion ha sido editada.');
      return redirect()->route('some.observations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Observation $observation)
    {
      $observation->delete();
      session()->flash('success', 'La observacion ha sido eliminada');
      return redirect()->route('some.observations.index');
    }
}
