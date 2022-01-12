<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\EventKey;
use Illuminate\Http\Request;

class EventKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'controaldor Evento Clave';
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
     * @param  \App\Models\Samu\EventKey  $eventKey
     * @return \Illuminate\Http\Response
     */
    public function show(EventKey $eventKey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\EventKey  $eventKey
     * @return \Illuminate\Http\Response
     */
    public function edit(EventKey $eventKey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Samu\EventKey  $eventKey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventKey $eventKey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\EventKey  $eventKey
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventKey $eventKey)
    {
        //
    }
}
