<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\Establishment;
use App\Models\Organization;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = Organization::pluck('id','name')->sort();
        $establishments = Organization::whereHas('samu')->pluck('id')->toArray();

        return view('samu.establishment.index', compact('organizations','establishments'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->input('establishments') as $establishment_id)
        {
            $data[] = ['organization_id'=> $establishment_id];
        }
        Establishment::truncate();
        Establishment::insert($data);

        return redirect()->back();
    }

}
