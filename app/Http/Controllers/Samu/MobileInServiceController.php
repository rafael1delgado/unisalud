<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use App\Models\Samu\MobileInService;
use App\Models\Samu\MobileCrew;
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
        $openShift = Shift::whereStatus(true)->first();
        
        if(!$openShift) 
        {
            session()->flash('danger', 'Debe abrir un turno primero');
            return redirect()->route('samu.welcome');
        }

        $lastShift = Shift::find($openShift->id - 1);

        return view('samu.mobileinservice.index', compact('openShift','lastShift'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shift = Shift::whereStatus(true)->first();

        if(!$shift) 
        {
            session()->flash('danger', 'Debe abrir un turno primero');
            return redirect()->route('samu.welcome');
        }

        $mobiles = Mobile::where('managed',1)->get();
        
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
        Gate::allowIf( auth()->user()->cannot('SAMU auditor') 
            ? Response::allow()
            : Response::deny('Acción no autorizada para "SAMU auditor".') 
        );

        $shift = Shift::whereStatus(true)->first();

        if($shift) 
        {
            $mobileInService = new MobileInService($request->all());
            
            $mobil = Mobile::find($request->input('mobile_id'));
            $mobileInService->status = $mobil->status;

            $mobileInService->shift()->associate($shift);

            $mobileInService->save();

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
        $shift = Shift::whereStatus(true)->first();

        if(!$shift) 
        {
            session()->flash('danger', 'Debe abrir un turno primero');
            return redirect()->route('samu.welcome');
        }
        $mobiles = Mobile::where('managed',true)->get();

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
        Gate::allowIf( auth()->user()->cannot('SAMU auditor') 
            ? Response::allow()
            : Response::deny('Acción no autorizada para "SAMU auditor".') 
        );
    
         /* Obtener el turno actual */
         $shift = Shift::whereStatus(true)->first();

        if($shift) {
            $mobileInService->fill($request->all());
            $mobileInService->status = $request->has('status') ? 1:0;
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
        Gate::allowIf( auth()->user()->cannot('SAMU auditor') 
            ? Response::allow()
            : Response::deny('Acción no autorizada para "SAMU auditor".') 
        );
    
        $mobileInService->delete();
 
        return redirect()->route('samu.mobileinservice.index')->with('danger', 'Eliminado satisfactoriamente.');
    }  


    public function crewedit(MobileCrew $mobileCrew)
    {
        $mobiles = Mobile::where('managed',true)->get();
    
        $shift = Shift::whereStatus(true)->first();

        return view('samu.crew.crewedit', compact('mobiles','shift','mobileCrew'));
    }

    public function crewupdate(Request $request, MobileCrew $mobileCrew)    
    {
        Gate::allowIf( auth()->user()->cannot('SAMU auditor') 
            ? Response::allow()
            : Response::deny('Acción no autorizada para "SAMU auditor".') 
        );
    
        $mobileCrew->fill($request->all());
        $mobileCrew->save();
        session()->flash('info', 'Movil editado.');
        return redirect()->route('samu.mobileinservice.index');

    }

    public function location()
    {
        return view('samu.mobileinservice.location');
    }

}  