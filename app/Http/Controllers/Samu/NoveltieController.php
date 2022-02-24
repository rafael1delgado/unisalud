<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\Noveltie;
use App\Models\Samu\Shift;
use Illuminate\Http\Request;


class NoveltieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Obtener el turno actual */
        $shift = Shift::where('status',true)->first();

        $novelties = Noveltie::latest()->paginate(20);

        return view ('samu.noveltie.index' , compact('novelties','shift'));//mando la variable al view
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Obtener el turno actual */
        $shift = Shift::where('status',1)->first();

        if($shift) {
            $noveltie = new Noveltie($request->All());
            $noveltie->shift()->associate($shift);
            $noveltie->save();
    
            $request->session()->flash('success', 'Novedad Creada.');

            return redirect()->route('samu.noveltie.index');
        }
        else {
            $request->session()->flash('danger', 'No se pudo registrar la novedad, 
                el turno se ha cerrado, solicite que abran un turno y luego intente guardar nuevamente.');
            
            return redirect()->back()->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\Noveltie  $noveltie
     * @return \Illuminate\Http\Response
     */
    public function edit(Noveltie $noveltie)
    {
        return view ('samu.noveltie.edit' , compact('noveltie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Samu\Noveltie  $noveltie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noveltie $noveltie)
    {
        /* Obtener el turno actual */
        $shift = Shift::where('status',1)->first();

        if($shift) {
            $noveltie->fill($request->all());
            $noveltie->save();

            session()->flash('success', 'La novedad se ha actualizado satisfactoriamente.');

            return redirect()->route('samu.noveltie.index');
        }
        else {
            $request->session()->flash('danger', 'No se pudo cambiar la novedad, 
                el turno se ha cerrado, solicite que abran un turno y luego intente guardar nuevamente.');
            
            return redirect()->back()->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\Noveltie  $noveltie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noveltie $noveltie)
    {
        //
    }
}
