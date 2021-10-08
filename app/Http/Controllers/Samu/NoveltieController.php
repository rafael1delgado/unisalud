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
       
        $shift = Shift::where('date', now()->format('Y-m-d'))->first(); //obtienes la variable shift
        $novelties=noveltie::orderBy('id','desc')->get(); // guarda todos los datos de la tabla
        //consulta para la union de dos tablas
        //$noveltie=Noveltie::has('shift')->get();
       

        //////////////
        return view ('samu.noveltie.index' , compact('novelties','shift'));//mando la variable al view
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$noveltie=noveltie::all(); // guarda todos los datos de la tabla
        //return view ('samu.novelties.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Guardar 
        $noveltie = new Noveltie($request->All());
    

        
        //Guardar 
        $shift = Shift::where('date', now()->format('Y-m-d'))->first();
        $noveltie->shift_id = $shift->id;
        $noveltie->save();
        $request->session()->flash('success', 'Novedad Creada.');
        return redirect()->route('samu.noveltie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Samu\Noveltie  $noveltie
     * @return \Illuminate\Http\Response
     */
    public function show(Noveltie $noveltie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\Noveltie  $noveltie
     * @return \Illuminate\Http\Response
     */
    public function edit(Noveltie $noveltie)
    {
        //dd($noveltie);
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
        
        $noveltie->fill($request->all());
        $noveltie->save();
        session()->flash('success', ' Actualizado satisfactoriamente.');
        return redirect()->route('samu.noveltie.index');
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
