<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\Call;
use App\Models\Samu\Event;
use App\Models\Samu\Key;
use App\Models\Samu\MobileInService;
use App\Models\Samu\Shift;
use Illuminate\Http\Request;
use App\Models\Samu\Mobile;
use App\Models\Samu\Ot;
use App\Models\Samu\ShiftUser;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*  */
        $openShift = Shift::where('status',true)
                    ->with(['calls','calls.events','calls.receptor'])
                    ->first();
        $lastShift = Shift::latest()
                    ->skip(1)
                    ->with(['calls','calls.events','calls.receptor'])
                    ->first();
                    
        return view ('samu.call.index' , compact('openShift','lastShift'));
    }

    public function ots()
    {
        $openShift = Shift::where('status',true)
                    ->with(['calls','calls.events','calls.receptor'])
                    ->first();
        $lastShift = Shift::latest()
                    ->skip(1)
                    ->with(['calls','calls.events','calls.receptor'])
                    ->first();
                    
        return view ('samu.call.ots' , compact('openShift','lastShift'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* Obtener el turno actual */
        $shift = Shift::where('status',true)->first();

        if(!$shift) 
        {
            session()->flash('danger', 'Debe abrir un turno primero');
            return redirect()->route('samu.welcome');
        }

        return view ('samu.call.create' , compact('shift'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shift = Shift::where('status',true)->first();

        if($shift) {
            $call = new Call($request->All());
            $call->hour = now();
            $call->shift()->associate($shift);
            $call->save();

            $request->session()->flash('success', 'Se ha guardado el nuevo llamado.');
            return redirect()->route('samu.call.create');
        }
        else {
            $request->session()->flash('danger', 'No se puede guardar el llamado, 
                el turno se ha cerrado, solicite que abran un turno y luego intente guardar nuevamente.');
            return redirect()->back()->withInput();
        }

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
    public function edit(Call $call)
    {
        /* Obtener el turno actual */
        $shift = Shift::where('status',true)->first();

        if(!$shift) 
        {
            session()->flash('danger', 'Debe abrir un turno primero');
            return redirect()->route('samu.welcome');
        }

        return view ('samu.call.edit' , compact('call', 'shift'));
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

        if($call->classification != $request->filled('classification'))
        {
            $call->regulator_id = auth()->id();
        }

        $call->fill($request->all());
        $call->save();

        $request->session()->flash('success', 'Se han actualizado los datos la orientación telefónica.');

        switch($call->classification) {
            case 'OT':                    
                return redirect()->route('samu.call.ots');
                break;
            case 'T1':
            case 'T2':
            case 'NM':
                return redirect()->route('samu.call.index');
                break;
            default:
                return redirect()->route('samu.call.index');
                break;
        }
    }


    public function syncevents(Request $request, Call $call)
    {
        if ($request->has('events')) 
        {
            $call->events()->sync($request->input('events'));
        }

        $request->session()->flash('success', 'Se han actualizado los datos del llamado.');
        return redirect()->route('samu.event.index');
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
        return redirect()->route('samu.call.index')->with('danger', 'Eliminado');
    }
}
