<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\Follow;
use Illuminate\Http\Request;



class FollowController extends Controller
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
    {
        $follows=follow::all();  // guarda todos los datos de la tabla
        return view ('samu.qtc.index' , compact('follow'));
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
        Follow::updateOrCreate(
        ['qtc_id' => $request->qtc_id],
        $request->All()
         );
        return redirect()->route('samu.qtc.index');
        

    }

    public function tstore(Request $request)
    {

        //devuelve user o lo crea
        Follow::updateOrCreate(
        ['qtc_id' => $request->qtc_id],
        $request->All()
        );
        return redirect()->route('samu.qtc.index');

    }

    public function otstore(Request $request)
    {
        
        //devuelve user o lo crea
        Follow::updateOrCreate(
        ['qtc_id' => $request->qtc_id],
        $request->All()
        );
        return redirect()->route('samu.qtc.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Samu\follow  $follow
     * @return \Illuminate\Http\Response
     */


     
    public function show(follow $follow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function edit(follow $follow)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Samu\follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, follow $follow)
    {
        //['qtc_id' => $request->qtc_id];
        $follow->fill($request->all());
        $follow->update();
    
        return redirect()->route('samu.qtc.index');
    }

    public function tupdate(Request $request, follow $follow)
    {
        //['qtc_id' => $request->qtc_id];
        $follow->fill($request->all());
        $follow->update();
    
        return redirect()->route('samu.qtc.index');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function destroy(follow $follow)
    {
        //
    }
}
