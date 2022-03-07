<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Samu\Shift;
use App\Models\Samu\Event;
use App\Models\Samu\Key;
use App\Models\Samu\Call;
use App\Models\Samu\MobileCrew;
use App\Models\Samu\EventUser;
use App\Models\Samu\EventCounter;
use App\Models\Samu\MobileInService;
use App\Models\Samu\Mobile;
use App\Models\Samu\ReceptionPlace;
use App\Models\Samu\Establishment;
use App\Models\Commune;
use App\Models\CodConIdentifierType;
use App\Models\Organization;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Obtener el turno actual */
        $shift = Shift::where('status',true)->first();
        
        if(!$shift) 
        {
            session()->flash('danger', 'Debe abrir un turno primero');
            return redirect()->route('samu.welcome');
        }

        $today = now();
        $yesterday = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $today) ) ));

        $open_events = Event::where('status',true)->latest()->get();
        $events_today = Event::whereDate('date',$today)->where('status',false)->latest()->get();
        $events_yesterday = Event::whereDate('date',$yesterday)->latest()->get();

        $calls = Call::doesnthave('events')
                    ->where('classification','<>','OT')
                    ->latest()
                    ->get();

        return view ('samu.event.index' , compact('shift','open_events','events_today','events_yesterday','calls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* Obtener el turno actual */
        $shift              = Shift::where('status',true)->first();
        if(!$shift) 
        {
            session()->flash('danger', 'Debe abrir un turno primero');
            return redirect()->route('samu.welcome');
        }
        $mobiles            = Mobile::where('managed',false)->get();
        $establishments     = Organization::whereHas('samu')->pluck('id','name')->sort();
        $nextCounter        = EventCounter::getNext();
        $receptionPlaces    = ReceptionPlace::pluck('id','name')->sort();
        $identifierTypes    = CodConIdentifierType::pluck('id','text')->sort();
        $keys               = Key::orderBy('key')->get();

        $calls = Call::latest()
            ->where('classification','<>','OT')
            ->limit(20)
            ->get();
        
        /* TODO: Parametrizar */
        $communes = Commune::where('region_id',1)->pluck('id','name')->sort();

        return view ('samu.event.create',compact(
            'shift',
            'keys',
            'establishments',
            'nextCounter',
            'mobiles',
            'receptionPlaces',
            'identifierTypes',
            'communes',
            'calls')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shift = Shift::where('status',true)->first();
        
        if($shift) 
        {
            $event = new Event($request->all());
            $event->patient_unknown = $request->has('patient_unknown') ? 1:0;
            $isMobileInService = $shift->MobilesInService->where('mobile_id',$request->input('mobile_id'))->first();
            
            if($isMobileInService)
            {
                $event->mobileInService()->associate($isMobileInService);
            }
            
            $event->shift()->associate($shift);
            $event->save();

            if($request->filled('call'))
            {
                $event->calls()->attach($request->input('call'));
            }
        
            $mobilecrews=MobileCrew::where('mobiles_in_service_id', $request->mobile_in_service_id)->get();

            foreach($mobilecrews as $mobilecrew)
            {
                EventUser::create([
                    'event_id'              => $event->id,
                    'user_id'               => $mobilecrew->user_id,
                    'job_type_id'           => $mobilecrew->job_type_id
                ]);
            }
            session()->flash('success', 'Se ha creado el evento');
            return redirect()->route('samu.event.index');
        }
        else
        {
            $request->session()->flash('danger', 'No se pudo registrar el evento ya que
                el turno se ha cerrado, solicite que abran un turno y luego intente guardar nuevamente.');
            
            return redirect()->back()->withInput();

        }
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Samu\Event $event
     * @return \Illuminate\Http\Response
     */


     
    public function show(event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\event  $follow
     * @return \Illuminate\Http\Response
     */
    public function edit(event $event)
    {
        /* Obtener el turno actual */
        $shift  = Shift::where('status',true)->first();
        if(!$shift) 
        {
            session()->flash('danger', 'Debe abrir un turno primero');
            return redirect()->route('samu.welcome');
        }
        $establishments     = Organization::whereHas('samu')->pluck('id','name')->sort();
        $keys               = Key::orderBy('key')->get();
        $mobiles            = Mobile::where('managed',false)->get();
        $receptionPlaces    = ReceptionPlace::pluck('id','name')->sort();
        $identifierTypes    = CodConIdentifierType::pluck('id','text')->sort();
        /* TODO: Parametrizar */
        $communes = Commune::where('region_id',1)->pluck('id','name')->sort();
        
        return view ('samu.event.edit', compact('shift','establishments','keys','event','mobiles','receptionPlaces','identifierTypes','communes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Samu\event  $follow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event $event)
    {   
        // $shift = Shift::where('status',true)->first();
        // if(!$shift) 
        // {
        //     session()->flash('danger', 'Debe abrir un turno primero');
        //     return redirect()->back()->withInput();
        // }
        $event->fill($request->all());
        $event->patient_unknown = $request->has('patient_unknown') ? 1:0;
        $isMobileInService = $event->shift->MobilesInService->where('mobile_id',$request->input('mobile_id'))->first();

        if($isMobileInService)
        {
            $event->mobileInService()->associate($isMobileInService);
        }
        else 
        {
            $event->mobileInService()->dissociate();
        }
        
        if($request->input("save_close") == "yes")
        {
            /** Chequear campos obligatorios */
            $event->status = false;
        }
        
        $event->update();
        
        session()->flash('success', 'Cometido actualizado satisfactoriamente.');
        return redirect()->route('samu.event.index');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->mobileInService()->dissociate();
        $event->calls()->detach();
        $event->delete();

        session()->flash('danger', 'Cometido eliminado.');
        return redirect()->back();
    }

    public function reopen(Event $event)
    {
        if($event->created_at->gt(now()->subDays(1)))
        {
            $event->status = true;
            $event->save();
    
            session()->flash('success', 'Cometido re abierto.');
        }
        else
        {
            session()->flash('danger', 'El cometido es mayor a 24 horas, no se puede reabrir.');
        }

        return redirect()->back();
    }

    public function filter(Request $request)
    {
        /* Obtener los filtros */
        $keys = Key::orderBy('key')->get();
        /* TODO: Parametrizar */
        $communes = Commune::where('region_id',1)->pluck('id','name')->sort();

        $events = collect();

        if($request->isMethod('post'))
        {
            $query = Event::query();
    
            if($request->filled('date')) {
                $query->whereDate('date',$request->input('date'));
            }
            if($request->filled('key_id')) {
                $query->where('key_id',$request->input('key_id'));
            }
            if($request->filled('address')) {
                $query->where('address', 'LIKE', '%' . $request->input('address') . '%');
            }
            if($request->filled('commune_id')) {
                $query->where('commune_id',$request->input('commune_id'));
            }
                
            $events = $query->withTrashed()->latest()->paginate(100);
                
            $request->flash();
        }
    

        return view ('samu.event.filter', compact('events','keys','communes'));
    }

    public function report(Event $event)
    {
        return view('samu.event.report',compact('event'));
    }

}
