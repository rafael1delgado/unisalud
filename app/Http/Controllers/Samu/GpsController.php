<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\Gps;
use Illuminate\Http\Request;

class GpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('lat') AND $request->has('lon'))
        {
            $gps = new Gps($request->all());
            $gps->save();
        }
        $locations = Gps::all();

        return view('samu.mobileinservice.gps',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Samu\Gps  $gps
     * @return \Illuminate\Http\Response
     */
    public function show(Gps $gps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\Gps  $gps
     * @return \Illuminate\Http\Response
     */
    public function edit(Gps $gps)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Samu\Gps  $gps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gps $gps)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\Gps  $gps
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gps $gps)
    {
        //
    }
}
