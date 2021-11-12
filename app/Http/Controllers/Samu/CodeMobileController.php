<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\Mobile;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //busqueda de codigos de clave
        $search_codemobile=$request->get('search_codemobile');  
        $mobiles= Mobile::when($search_codemobile!=null, function ($query) use ($search_codemobile){
            $query->where('name_mobile_code','like','%'.$search_codemobile.'%');
        })->paginate(30);
        return view ('samu.mobile.index' , compact('mobiles','search_codemobile')); 



      /*   $codemobiles = CodeMobile::all();
        return view('samu.codemobile.index', compact('codemobiles')); */

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('samu.mobile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mobile=new Mobile($request->all());
        $mobile->save();

        $mobiles = Mobile::all();
        session()->flash('success', 'Se ha creado la codificación de móvil exitosamente');
        return redirect()->route ('samu.mobile.index', compact('mobiles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Samu\Mobile  $codeMobile
     * @return \Illuminate\Http\Response
     */
    public function show(Mobile $Mobile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\Mobile  $codeMobile
     * @return \Illuminate\Http\Response
     */
    public function edit(Mobile $Mobile)
    {
        return view('samu.mobile.edit', compact('Mobile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Samu\Mobile  $codeMobile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mobile $Mobile)
    {
        $Mobile->fill($request->all());
        //$specialty->user_id = Auth::id();
        $Mobile->save();

        session()->flash('info', 'La codificación de Móvil ha sido editada.');
        return redirect()->route('samu.mobile.index', compact('Mobile'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\Mobile  $codeMobile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mobile $Mobile)
    {
        $Mobile->delete();
        return redirect()->route('samu.mobile.index')->with('danger', 'Eliminado satisfactoriamente');
    }
}
