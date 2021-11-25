<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\Shift;
use App\Models\Samu\Qtc;
use App\Models\Samu\Key;
use App\Models\Samu\Call;
use App\Models\Samu\MobileInService;
use Illuminate\Http\Request;
use App\Models\Samu\Mobile;


class QtcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Obtener el turno actual */
        $shift = Shift::where('status',1)->first();

        return view ('samu.qtc.index' , compact('shift'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* Obtener el turno actual */
        $shift = Shift::where('status',1)->first();

        $keys = Key::all();

        return view ('samu.qtc.create',compact('shift','keys'));
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

        if($shift) 
        {
            $qtc = new Qtc($request->all());
            
            $qtc->shift()->associate($shift);

            $qtc->save();

            session()->flash('success', 'Se ha creado el QTC');
            return redirect()->route('samu.qtc.index');
        }
        else
        {
            $request->session()->flash('danger', 'No se pudo registrar el QTC ya que
                el turno se ha cerrado, solicite que abran un turno y luego intente guardar nuevamente.');
            
            return redirect()->back()->withInput();

        }
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Samu\Qtc $qtc
     * @return \Illuminate\Http\Response
     */


     
    public function show(qtc $qtc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\qtc  $follow
     * @return \Illuminate\Http\Response
     */
    public function edit(qtc $qtc)
    {
        /* Obtener el turno actual */
        $shift = Shift::where('status',1)->first();

        $keys = Key::all();
        return view ('samu.qtc.edit', compact('shift','keys','qtc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Samu\qtc  $follow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, qtc $qtc)
    {
        //['qtc_id' => $request->qtc_id];
        $qtc->fill($request->all());
        $qtc->update();
        session()->flash('success', ' Actualizado satisfactoriamente.');
        return redirect()->route('samu.call.index', compact('qtc'));
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\qtc  $qtc
     * @return \Illuminate\Http\Response
     */
    public function destroy(qtc $qtc)
    {
        //
    }
}
