<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commune;
use App\Models\Samu\Commune as SamuCommune;

class CommuneController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $communes = Commune::pluck('id', 'name')->sort();
        $samuCommunes = Commune::whereHas('samu')->pluck('id')->toArray();

        return view('samu.commune.index', compact('communes', 'samuCommunes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->input('samuCommunes') as $samuCommune)
        {
            $data[] = ['commune_id'=> $samuCommune, 'created_at' => now()];
        }
        SamuCommune::truncate();
        SamuCommune::insert($data);

        return redirect()->back();
    }

}
