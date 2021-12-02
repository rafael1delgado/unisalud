<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\Shift;
use App\Models\Samu\Qtc;
use App\Models\Samu\Key;
use App\Models\Samu\Call;
use App\Models\Samu\MobileCrew;
use App\Models\Samu\QtcUser;
use App\Models\Samu\QtcCounter;
use App\Models\Samu\MobileInService;
use Illuminate\Http\Request;
use App\Models\Samu\Mobile;
use App\Models\Organization;



class QtcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Obtener el turno actual */
        $today = now();
        $yesterday = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $today) ) ));

        $qtcs_today = Qtc::whereDate('date',$today)->latest()->get();
        $qtcs_yesterday = Qtc::whereDate('date',$yesterday)->latest()->get();

        return view ('samu.qtc.index' , compact('qtcs_today','qtcs_yesterday'));
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

        $establishments = Organization::pluck('name','id')->sort();
        $nextCounter = QtcCounter::getNext();
        $keys = Key::all();

        return view ('samu.qtc.create',compact('shift','keys','establishments','nextCounter'));
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
            $qtc = new Qtc($request->all());
            
            $qtc->shift()->associate($shift);
            $qtc->save();
        
            $mobilecrews=MobileCrew::where('mobiles_in_service_id', $request->mobile_in_service_id)->get();

            foreach($mobilecrews as $mobilecrew)
            {
                QtcUser::create([
                    'qtc_id'                => $qtc->id,
                    'user_id'               => $mobilecrew->user_id,
                    'job_type_id'           => $mobilecrew->job_type_id
                ]);
                


            }
            session()->flash('success', 'Se ha creado el QTC');
            return redirect()->route('samu.qtc.index');
        }
        else
        {
            $request->session()->flash('danger', 'No se pudo registrar el QTC ya que
                el turno se ha cerrado, solicite que abran un turno y luego intente guardar nuevamente.');
            
            return redirect()->back()->withInput();

        }
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
        /* Obtener el turno actual */
        $shift = Shift::where('status',true)->first();
        $establishments = Organization::pluck('name','id')->sort();
        $keys = Key::all();
        return view ('samu.qtc.edit', compact('shift','establishments','keys','qtc'));
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
        $qtc->fill($request->all());
        $qtc->update();

        session()->flash('success', 'Qtc Actualizado satisfactoriamente.');
        return redirect()->route('samu.qtc.index');
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
