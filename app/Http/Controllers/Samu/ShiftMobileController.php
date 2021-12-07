<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\ShiftMobile;
use Illuminate\Http\Request;
use App\Models\Samu\CodeMobile;
use App\Models\Samu\Shift;


class ShiftMobileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shifts = Shift::all()->sortByDesc("id");
        return view('samu.mobile.index',compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $shifts=shift::all();
        $codemobiles = CodeMobile::all();
        $shiftMobiles=shiftMobile::all();  // guarda todos los datos de la tabla

        return view('samu.mobile.create' , compact('shiftMobiles','shifts','codemobiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ShiftMobile::updateOrCreate(
        ['shift_id' => $request->shift_id],
        $request->All()
            );
        $request->session()->flash('success', 'Se agrego un nuevo movil al turno.');
        return redirect()->route('samu.mobile.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Samu\ShiftMobile  $shiftMobile
     * @return \Illuminate\Http\Response
     */
    public function show(ShiftMobile $shiftMobile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\ShiftMobile  $shiftMobile
     * @return \Illuminate\Http\Response
     */
    public function edit(ShiftMobile $shiftMobile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Samu\ShiftMobile  $shiftMobile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShiftMobile $shiftMobile)
    {
        $shiftMobile->fill($request->all());
        $shiftMobile->update();
    
        return redirect()->route('samu.mobile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\ShiftMobile  $shiftMobile
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShiftMobile $shiftMobile)
    {
        //
    }
}
