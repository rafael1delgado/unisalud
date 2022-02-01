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

        $today = now();
        $yesterday = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $today) ) ));

        $events_today = Event::whereDate('date',$today)->latest()->get();
        $events_yesterday = Event::whereDate('date',$yesterday)->latest()->get();

        return view ('samu.event.index' , compact('shift','events_today','events_yesterday'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* Obtener el turno actual */
        $shift = Shift::where('status',true)->first();
        $mobiles = Mobile::where('managed',false)->get();
        $establishments = Organization::whereHas('samu')->pluck('id','name')->sort();
        $nextCounter = EventCounter::getNext();
        $receptionPlaces = ReceptionPlace::pluck('id','name')->sort();
        $identifierTypes = CodConIdentifierType::pluck('id','text')->sort();
        $keys = Key::orderBy('key')->get();
        /* TODO: Parametrizar */
        $communes = Commune::where('region_id',1)->pluck('id','name')->sort();

        return view ('samu.event.create',compact('shift','keys','establishments','nextCounter','mobiles','receptionPlaces','identifierTypes','communes'));
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
            $event->patient_unknown = $request->has('patient_unknown') ? true:false;
            $isMobileInService = $shift->MobilesInService->where('mobile_id',$request->input('mobile_id'))->first();
            
            if($isMobileInService)
            {
                $event->mobileInService()->associate($isMobileInService);
            }
            
            $event->shift()->associate($shift);
            $event->save();
        
            $mobilecrews=MobileCrew::where('mobiles_in_service_id', $request->mobile_in_service_id)->get();

            foreach($mobilecrews as $mobilecrew)
            {
                EventUser::create([
                    'event_id'                => $event->id,
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
        $shift = Shift::where('status',true)->first();
        $establishments = Organization::whereHas('samu')->pluck('id','name')->sort();
        $keys = Key::orderBy('key')->get();
        $mobiles = Mobile::where('managed',false)->get();
        $receptionPlaces = ReceptionPlace::pluck('id','name')->sort();
        $identifierTypes = CodConIdentifierType::pluck('id','text')->sort();
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
        $shift = Shift::where('status',true)->first();

        $event->fill($request->all());
        $event->patient_unknown = $request->has('patient_unknown') ? true:false;
        $isMobileInService = $shift->MobilesInService->where('mobile_id',$request->input('mobile_id'))->first();

        if($isMobileInService)
        {
            $event->mobileInService()->associate($isMobileInService);
        }
        else 
        {
            $event->mobileInService()->dissociate();
        }
        $event->update();

        session()->flash('success', 'Event Actualizado satisfactoriamente.');
        return redirect()->route('samu.event.index');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(event $event)
    {
        //
    }

    public function filter(Request $request)
    {
        /* Obtener los filtrados */
        $keys = Key::orderBy('key')->get();
        /* TODO: Parametrizar */
        $communes = Commune::where('region_id',1)->pluck('id','name')->sort();

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
            
            
        $events = $query->paginate(50);
        
        $request->flash();

        return view ('samu.event.filter', compact('events','keys','communes'));
    }

}
