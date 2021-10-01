<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\CodeMobile;
use Illuminate\Http\Request;

class CodeMobileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codemobiles = CodeMobile::all();
        return view('samu.codemobile.index', compact('codemobiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('samu.codemobile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $code_mobile=new CodeMobile($request->all());
        $code_mobile->save();

        $codemobiles = CodeMobile::all();
        session()->flash('success', 'Se ha creado la codificación de móvil exitosamente');
        return redirect()->route ('samu.codemobile.index', compact('codemobiles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Samu\CodeMobile  $codeMobile
     * @return \Illuminate\Http\Response
     */
    public function show(CodeMobile $codeMobile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\CodeMobile  $codeMobile
     * @return \Illuminate\Http\Response
     */
    public function edit(CodeMobile $codeMobile)
    {
        return view('samu.codemobile.edit', compact('codeMobile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Samu\CodeMobile  $codeMobile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CodeMobile $codeMobile)
    {
        $codeMobile->fill($request->all());
        //$specialty->user_id = Auth::id();
        $codeMobile->save();

        session()->flash('info', 'La codificación de Móvil ha sido editada.');
        return redirect()->route('samu.codemobile.index', compact('codeMobile'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\CodeMobile  $codeMobile
     * @return \Illuminate\Http\Response
     */
    public function destroy(CodeMobile $codeMobile)
    {
        $codeMobile->delete();
        return redirect()->route('samu.codemobile.index')->with('danger', 'Eliminado satisfactoriamente');
    }
}
