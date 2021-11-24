<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\Shift;
use App\Models\User;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allowCreate = Shift::where('status',true)->exists() ? false: true;
        $shifts = Shift::orderBy('id','desc')->paginate(60);

        return view('samu.shift.index', compact('shifts','allowCreate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('samu.shift.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shift = new Shift($request->all());
        $shift->save();

        session()->flash('success', 'Se ha creado el turno exitosamente');
        return redirect()->route('samu.shift.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Samu\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
        //
        return view('samu.shift.edit', compact('shift'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Samu\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shift $shift)
    {
        $shift->fill($request->all());
        //$specialty->user_id = Auth::id();
        $shift->save();

        session()->flash('info', 'El turno ha sido editado.');
        return redirect()->route('samu.shift.index', compact('shift'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shift $shift)
    {
        $shift->delete();
        return redirect()->route('samu.shift.index')->with('danger', 'Eliminado satisfactoriamente');
    }
}
