<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\Follow;
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
        $qtcs=qtc::orderBy('id','desc')->get(); // guarda todos los datos de la tabla
        //return $qtcs; 
       return view ('samu.qtc.index' , compact('qtcs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $qtc=qtc::all(); // guarda todos los datos de la tabla
        //return $codekeys;
        return view ('samu.codekey.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Guardar QTC
        $qtc = new Qtc($request->All());
        $qtc->save();

        //Guardar Follow
        $follow = new Follow();
        $follow->qtc_id = $qtc->id;
        $follow->save();
  
        $request->session()->flash('success', 'Se ha creado el nuevo QTC.');
        return redirect()->route('samu.qtc.index');
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
        switch ($qtc->class_qtc) {
            case 'emergencia':
                return view ('samu.qtc.edit' , compact('qtc'));
                break;
            case 'ot' :
                return view ('samu.qtc.otedit' , compact('qtc'));
                break;
            case 'traslado':
                return view ('samu.qtc.tedit' , compact('qtc'));
                break;
            default: 
                return null;
                break;
        }

        //return view ('samu.qtc.edit' , compact('qtc'));
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
        $qtc->fill($request->all());
        $qtc->update();
        session()->flash('success', ' Actualizado satisfactoriamente.');
        return redirect()->route('samu.qtc.index');
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
