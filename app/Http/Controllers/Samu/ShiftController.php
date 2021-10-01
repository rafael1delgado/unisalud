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
        $shifts = Shift::all();
        // $users_shift = Shift::find(4)->users;
        $jefe_turno = '';
        $medico_regulador = '';
        $enfermera_reguladora = '';
        $operadores = '';
        $despachadores = '';
        foreach($shifts as $shift){
            foreach($shift->users_manager_shift as $manager_shift){
                $nombres = $manager_shift->humanNames->first()->text;
                $apaterno = $manager_shift->humanNames->first()->fathers_family;
                $amaterno = $manager_shift->humanNames->first()->mothers_family;
                $jefe_turno .= $nombres." ".$apaterno." ".$amaterno.", ";
            }
            foreach($shift->users_regulatory_doctor as $regulatory_doctor){
                $nombres = $regulatory_doctor->humanNames->first()->text;
                $apaterno = $regulatory_doctor->humanNames->first()->fathers_family;
                $amaterno = $regulatory_doctor->humanNames->first()->mothers_family;
                $medico_regulador .= $nombres." ".$apaterno." ".$amaterno.", ";
            }
            foreach($shift->users_regulatory_nurse as $regulatory_nurse){
                $nombres = $regulatory_nurse->humanNames->first()->text;
                $apaterno = $regulatory_nurse->humanNames->first()->fathers_family;
                $amaterno = $regulatory_nurse->humanNames->first()->mothers_family;
                $enfermera_reguladora .= $nombres." ".$apaterno." ".$amaterno.", ";
            }
            foreach($shift->users_operators as $operator){
                $nombres = $operator->humanNames->first()->text;
                $apaterno = $operator->humanNames->first()->fathers_family;
                $amaterno = $operator->humanNames->first()->mothers_family;
                $operadores .= $nombres." ".$apaterno." ".$amaterno.", ";
            }
            foreach($shift->users_dispatchers as $dispatcher){
                $nombres = $dispatcher->humanNames->first()->text;
                $apaterno = $dispatcher->humanNames->first()->fathers_family;
                $amaterno = $dispatcher->humanNames->first()->mothers_family;
                $despachadores .= $nombres." ".$apaterno." ".$amaterno.", ";
            }
        }
        $str_jefe_turno = substr($jefe_turno, 0, -2);
        $str_medico_regulador = substr($medico_regulador, 0, -2);
        $str_enfermera_reguladora = substr($enfermera_reguladora, 0, -2);
        $str_operadores = substr($operadores, 0, -2);
        $str_despachadores = substr($despachadores, 0, -2);
        return view('samu.shift.index', compact('shifts', 'str_jefe_turno', 'str_medico_regulador', 'str_enfermera_reguladora', 'str_operadores', 'str_despachadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('samu.shift.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shift=new Shift($request->all());
        $shift->status = 'No iniciado';
        $shift->save();

        // foreach($request->nombre_combo as $operador_id){
        //     $shift->operators()->attach($operador_id, ['job_type'=>'operador']);
        // }

        $shifts = Shift::all();
        session()->flash('success', 'Se ha creado el turno exitosamente');
        return redirect()->route ('samu.shift.index', compact('shifts'));
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
