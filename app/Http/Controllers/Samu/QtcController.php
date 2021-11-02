<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\Follow;
use App\Models\Samu\CodeKey;
use App\Models\Samu\Qtc;
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
        $mobiles = Mobile::all();
        $qtcs=qtc::orderBy('id','desc')->get(); // guarda todos los datos de la tabla
        //return $qtcs; 
       return view ('samu.qtc.index' , compact('qtcs','mobiles'));
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
    public function hora(Request $request)
    {
    $hora = new DateTime("now", new DateTimeZone('Santiago/Chile'));
    return $hora->format('G');
    }

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
        $keys=CodeKey::all();
     

        switch ($qtc->class_qtc) {
            case 'T1':
                return view ('samu.qtc.edit' , compact('qtc','keys'));
                break;
            case 'T2' :
                return view ('samu.qtc.tedit' , compact('qtc','keys'));
                break;
            case 'NM' :
                    return view ('samu.qtc.edit' , compact('qtc','keys'));
                    break;
            case 'OT':
                return view ('samu.qtc.otedit' , compact('qtc','keys'));
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
        $qtc->delete();
        return redirect()->route('samu.qtc.index')->with('danger', ' Eliminado');
    }
}
