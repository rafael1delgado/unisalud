<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\Qtc;
use App\Models\Samu\CodeKey;
use App\Models\Samu\Call;
use App\Models\Samu\Shift;
use Illuminate\Http\Request;
use App\Models\Samu\Mobile;


class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shift = Shift::where('date', now()->format('Y-m-d'))->first(); //obtienes la variable shift
        $mobiles = Mobile::all();
        $calls=Call::orderBy('id','desc')->get(); // guarda todos los datos de la tabla
        //return $calls; 
        
       return view ('samu.call.index' , compact('calls','mobiles', 'shift'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $call=Call::all(); // guarda todos los datos de la tabla
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
        $call = new Call($request->All());
        $call->save();
       

        //Guardar Follow
        $follow = new  Qtc();
        $follow->call_id = $call->id;
        $follow->save();
  
        $request->session()->flash('success', 'Se ha creado el nuevo QTC.');
        return redirect()->route('samu.qtc.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Samu\Call  $qtc
     * @return \Illuminate\Http\Response
     */
    public function hora(Request $request)
    {
    $hora = new DateTime("now", new DateTimeZone('Santiago/Chile'));
    return $hora->format('G');
    }

    public function show(Call $call)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\Call  $qtc
     * @return \Illuminate\Http\Response
     */
    public function edit(Call $call, Shift $shift)
    
    {
        //$shift = Shift::where('date', now()->format('Y-m-d'))->first(); //obtienes la variable shift
        $keys=CodeKey::all();
     
        switch ($call->class_call) {
            case 'T1':
                return view ('samu.call.edit' , compact('call','keys','shift'));
                break;
            case 'T2' :
                return view ('samu.call.tedit' , compact('call','keys','shift'));
                break;
            case 'NM' :
                    return view ('samu.call.edit' , compact('call','keys','shift'));
                    break;
            case 'OT':
                return view ('samu.call.otedit' , compact('call','keys','shift'));
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
     * @param  \App\Models\Samu\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Call $call)
    {
        $call->fill($request->all());
        $call->update();
        session()->flash('success', ' Actualizado satisfactoriamente.');
        return redirect()->route('samu.call.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\Call  $qtc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Call $call)
    {
        $call->delete();
        return redirect()->route('samu.call.index')->with('danger', ' Eliminado');
    }
}
