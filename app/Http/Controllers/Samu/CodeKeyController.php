<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\CodeKey;
use Illuminate\Http\Request;

class CodeKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //busqueda de codigos de clave
        $search_codekey=$request->get('search_codekey');       
        $codekeys=CodeKey::when($search_codekey!=null, function ($query) use ($search_codekey){
        $query->where('name_key_code','like','%'.$search_codekey.'%');
        })->paginate(30);
         
     
        //$codekeys=CodeKey::all(); // guarda todos los datos de la tabla
        //return $codekeys;  mostrar los datos de la bd
        return view ('samu.codekey.index' , compact('codekeys','search_codekey'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $codekeys=CodeKey::all(); // guarda todos los datos de la tabla
        //return $codekeys;
        return view ('samu.codekey.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        CodeKey::create($request->all());
        $request->session()->flash('success', 'Creado satisfactoriamente.');
        return redirect()->route('samu.codekey.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Samu\CodeKey  $codeKey
     * @return \Illuminate\Http\Response
     */
    public function show(CodeKey $codeKey)
    {
       
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\CodeKey  $codeKey
     * @return \Illuminate\Http\Response
     */
    public function edit(CodeKey $codeKey)
    {
        //return $codeKey;
        return view ('samu.codekey.edit' , compact('codeKey'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Samu\CodeKey  $codeKey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CodeKey $codeKey)
    {
        
        $codeKey->fill($request->all());
        $codeKey->update();
        session()->flash('success', ' Actualizado satisfactoriamente.');
        return redirect()->route('samu.codekey.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\CodeKey  $codeKey
     * @return \Illuminate\Http\Response
     */
    public function destroy(CodeKey $codeKey)
    {
        $codeKey->delete();
        return redirect()->route('samu.codekey.index')->with('danger', 'Eliminado satisfactoriamente');
    }
}
