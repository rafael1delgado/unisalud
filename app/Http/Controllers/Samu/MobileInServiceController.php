<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Http\Requests\MobileInService\MobileInServiceStoreRequest;
use App\Http\Requests\MobileInService\MobileInServiceUpdateRequest;
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

        $mobiles = Mobile::whereManaged(1)->get();
        
        return view('samu.mobileinservice.create', compact('mobiles','shift'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MobileInService\MobileInServiceStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MobileInServiceStoreRequest $request)
    {
        $shift = Shift::whereStatus(true)->first();

        if($shift) 
        {
            $dataValidated = $request->validated();
            $mobil = Mobile::find($dataValidated['mobile_id']);

            $dataValidated['status'] = $mobil->status;
            $dataValidated['shift_id'] = $shift->id;
            MobileInService::create($dataValidated);

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
        $mobiles = Mobile::whereManaged(true)->get();

        return view('samu.mobileinservice.edit', compact('mobiles','shift','mobileInService'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\MobileInService\MobileInServiceUpdateRequest  $request
     * @param  \App\Models\Samu\MobileInService  $mobileInService
     * @return \Illuminate\Http\Response
     */
    public function update(MobileInServiceUpdateRequest $request, MobileInService $mobileInService)
    {
        /* Obtener el turno actual */
        $shift = Shift::whereStatus(true)->first();

        if($shift) 
        {
            $dataValidated = $request->validated();
            $dataValidated['shift_id'] = $shift->id;
            $dataValidated['status'] = $request->has('status') ? 1 : 0;
            
            $mobileInService->update($dataValidated);
            
            $mobilesInService = MobileInService::query()
                ->whereShiftId($shift->id)
                ->orderBy('status', 'DESC')
                ->orderBy('position', 'ASC')
                ->get();

            foreach($mobilesInService as $index => $mis)
            {
                $mis->update([
                    'position' => $index + 1
                ]);
            }
            
            session()->flash('info', 'Movil editado.');
            return redirect()->route('samu.mobileinservice.index', compact('mobileInService'));
        }
        else
        {
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
        $mobileInService->update([
            'position' => 0,
        ]);

        $mobileInService->delete();
 
        return redirect()->route('samu.mobileinservice.index')->with('danger', 'Eliminado satisfactoriamente.');
    }  


    public function crewedit(MobileCrew $mobileCrew)
    {
        $mobiles = Mobile::where('managed',true)->get();
    
        $shift = Shift::where('status',true)->get();
        return view('samu.crew.crewedit', compact('mobiles','shift','mobileCrew'));
    }

    public function crewupdate(Request $request, MobileCrew $mobileCrew)    
    {
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