<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\Qtc;
use Illuminate\Http\Request;

class QtcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'controlador QTC';
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
     * @param  \App\Models\Samu\Qtc  $qtc
     * @return \Illuminate\Http\Response
     */
    public function show(Qtc $qtc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\Qtc  $qtc
     * @return \Illuminate\Http\Response
     */
    public function edit(Qtc $qtc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Samu\Qtc  $qtc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Qtc $qtc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\Qtc  $qtc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qtc $qtc)
    {
        //
    }
}
