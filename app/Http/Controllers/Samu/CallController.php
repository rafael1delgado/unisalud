<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\Call;
use App\Models\Samu\Qtc;
use App\Models\Samu\Key;
use App\Models\Samu\MobileInService;
use App\Models\Samu\Shift;
use Illuminate\Http\Request;
use App\Models\Samu\Mobile;
use App\Models\Samu\Ot;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shift = Shift::where('date', now()->format('Y-m-d'))->first(); //obtienes la variable shift
        $mobiles = Mobile::all();
        $calls = Call::orderBy('id','desc')->get(); // guarda todos los datos de la tabla
        //return $calls; 
        
       return view ('samu.call.index' , compact('calls','mobiles', 'shift'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('samu.key.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Shift $shift)
    {
        //Guardar Call
        $call = new Call($request->All());
        $call->shift()->associate($shift);
        $call->qtc()->associate(Qtc::create());
        $call->ot()->associate(Ot::create());
        $call->save();
  
        $request->session()->flash('success', 'Ingreso Un nuevo llamado.');
        return redirect()->route('samu.call.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Samu\Call  $call
     * @return \Illuminate\Http\Response
     */


    public function show(Call $call)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function edit(Call $call, Shift $shift)
    {
        $keys = Key::all();
        $mobilesInServices = $shift->mobilesInService;
        return view ('samu.call.edit' , compact('call','keys','mobilesInServices'));
    }

 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Samu\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Call $call)
    {
        $call->fill($request->all());
        $call->update();
        session()->flash('success', ' Actualizado satisfactoriamente.');
        return redirect()->route('samu.call.edit', compact('call'));
    }


 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function destroy(Call $call)
    {
        $call->delete();
        return redirect()->route('samu.call.index')->with('danger', ' Eliminado');
    }
}
