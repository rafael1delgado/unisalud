<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
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
      

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   //$codemobiles = CodeMobile::all();
        $qtcs=qtc::all();  // guarda todos los datos de la tabla
        return view ('samu.call.index' , compact('calls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        //devuelve user o lo crea
       
        Qtc::updateOrCreate(
        ['call_id' => $request->call_id],
        $request->All()
         );
        return redirect()->route('samu.call.index' ,'key', 'mobilesInService');
        

    }

    public function tstore(Request $request)
    {

        //devuelve user o lo crea
        Qtc::updateOrCreate(
        ['call_id' => $request->call_id],
        $request->All()
        );
        return redirect()->route('samu.call.index','key', 'mobilesInService');

    }

    public function otstore(Request $request)
    {
        
        //devuelve user o lo crea
        Call::updateOrCreate(
        ['call_id' => $request->call_id],
        $request->All()
        );
        return redirect()->route('samu.call.index');

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
    
        return redirect()->route('samu.call.index', compact('qtc'));
    }

    public function tupdate(Request $request, qtc $qtc)
    {
        //['qtc_id' => $request->qtc_id];
        $qtc->fill($request->all());
        $qtc->update();
    
        return redirect()->route('samu.qtc.index', $qtc);
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
