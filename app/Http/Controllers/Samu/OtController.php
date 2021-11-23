<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\Ot;
use Illuminate\Http\Request;

class OtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Samu\Ot  $ot
     * @return \Illuminate\Http\Response
     */
    public function show(Ot $ot)
    {
        //
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Samu\Ot  $ot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ot $ot)
    {        
        $ot->fill($request->all());
        $ot->save();
        
        session()->flash('info', 'El ot ha sido actualizado.');
        return redirect()->route('samu.call.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\Ot  $ot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ot $ot)
    {
        //
    }
}
