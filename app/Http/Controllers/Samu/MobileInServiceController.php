<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\MobileInService;
use App\Models\Samu\Shift;
use App\Models\Samu\Mobile;
use Illuminate\Http\Request;

class MobileInServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $shifts = Shift::latest()->get();
        return view('samu.mobileinservice.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $mobiles = Mobile::all();

        $shifts = Shift::latest()->get();
        return view('samu.mobileinservice.create', compact('mobiles','shifts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $mobileInService=new MobileInService($request->all());
        $mobil = Mobile::find($request->input('mobile_id'));
        $mobileInService->status = $mobil->status;
        $mobileInService->save();

        //$mobileinservices = MobileInService::all();
        session()->flash('success', 'Se ha añadido exitosamente');
        return redirect()->route('samu.mobileinservice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Samu\MobileInService  $mobileInService
     * @return \Illuminate\Http\Response
     */
    public function show(MobileInService $mobileInService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\MobileInService  $mobileInService
     * @return \Illuminate\Http\Response
     */
    public function edit(MobileInService $mobileInService)
    {
        $mobiles = Mobile::where('managed',true)->get();
        $shifts = Shift::latest()->get();
        return view('samu.mobileinservice.edit', compact('mobiles','shifts','mobileInService'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Samu\MobileInService  $mobileInService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MobileInService $mobileInService)

    {
       
        $mobileInService->fill($request->all());
        $mobileInService->save();

        session()->flash('info', 'Movil editado.');
        return redirect()->route('samu.mobileinservice.index', compact('mobileInService'));
    
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\MobileInService  $mobileInService
     * @return \Illuminate\Http\Response
     */
    public function destroy(MobileInService $mobileInService)
    {
        //
    }
}
