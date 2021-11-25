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
      
        $shift = Shift::where('status',1)->get();
        return view('samu.mobileinservice.index', compact('shift'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $mobiles = Mobile::all();

        $shift = Shift::where('status',1)->get();
        

        return view('samu.mobileinservice.create', compact('mobiles','shift'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shift = Shift::where('status',1)->get();
        if($shift) 
        {
        $mobileInService=new MobileInService($request->all());
        $mobil = Mobile::find($request->input('mobile_id'));
        $mobileInService->status = $mobil->status;
        $shift = Shift::where('status',1)->get();
        $mobileInService->shift()->associate($shift);

        $mobileInService->save();

        //$mobileinservices = MobileInService::all();
        session()->flash('success', 'Se ha añadido exitosamente');
        return redirect()->route('samu.mobileinservice.index');
        }
        else
        {
            $request->session()->flash('danger', 'No se pudo registrar el movil ya que
                el turno se ha cerrado, solicite que abran un turno y luego intente guardar nuevamente.');
            
            return redirect()->back()->withInput();

        }
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
        $shift = Shift::where('status',1)->get();
        return view('samu.mobileinservice.edit', compact('mobiles','shift','mobileInService'));
    
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
         /* Obtener el turno actual */
         $shift = Shift::where('status',1)->first();

        if($shift) {
            $mobileInService->fill($request->all());
            $mobileInService->save();
            $mobileInService->shift()->associate($shift);    
            session()->flash('info', 'Movil editado.');
            return redirect()->route('samu.mobileinservice.index', compact('mobileInService'));
        }
        else {
            $request->session()->flash('danger', 'No se pudo actualizar el cambio, 
                el turno se ha cerrado, solicite que abran un turno y luego intente guardar nuevamente.');
            
            return redirect()->back()->withInput();
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\MobileInService  $mobileInService
     * @return \Illuminate\Http\Response
     */
    public function destroy(MobileInService $mobileInService)
    {
        
        $mobileInService->delete();
 
        return redirect()->route('samu.mobileinservice.index')->with('danger', 'Eliminado satisfactoriamente.');
    }  
}
