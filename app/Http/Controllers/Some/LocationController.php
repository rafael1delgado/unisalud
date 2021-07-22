<?php

namespace App\Http\Controllers\Some;

use App\Models\Location;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $locations = Location::all();

      return view('some.locations.index', compact('locations'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        $organization = Organization::all();
        return view('some.locations.create', compact('organization', 'locations'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $location = new Location($request->All());
      //$location->user_id = Auth::id();
      $location->save();

      session()->flash('info', 'La locacion ha sido creada.');
      return redirect()->route('some.locations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
      $organization = Organization::all();
      $location = Location::all();
        return view('some.locations.edit', compact('organization', 'location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
      $location->fill($request->all());
      //$location->user_id = Auth::id();
      $location->save();

      session()->flash('info', 'La locacion ha sido editada.');
      return redirect()->route('some.locations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Location $location)
    {
      $location->delete();
      session()->flash('success', 'La locacion ha sido eliminada');
      return redirect()->route('some.locations.index');
    }


}
