<?php

namespace App\Http\Controllers;

use App\Http\Requests\Coordinate\CoordinateStoreRequest;
use App\Models\Coordinate;
use Illuminate\Http\Request;

class CoordinateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coordinates = Coordinate::all();

        return view('samu.coordinate.index', compact('coordinates'));
    }

    public function search(Request $request)
    {
        $searchString = $request->string;
        $coordinates = Coordinate::where('name', 'like', "%{$request->string}%")->get();
        return view('samu.coordinate.index', compact('coordinates', 'searchString'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('samu.coordinate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Coordinate\CoordinateStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoordinateStoreRequest $request)
    {
        $dataValidated = $request->validated();

        $coordinates = Coordinate::query()
            ->whereLatitude($dataValidated['latitude'])
            ->whereLongitude($dataValidated['longitude'])
            ->whereBetween('created_at', [now()->subDay(), now()]);

        if($coordinates->count() == 0)
        {
            $coordinate = Coordinate::create($dataValidated);
            $type = 'success';
            $msg = 'Se envió correctamente su ubicación a SAMU, su identificador es: ' . $coordinate->id;
        }
        else
        {
            $type = 'danger';
            $msg = 'La ubicación ya está registrada en SAMU, el identificador es: ' . $coordinates->first()->id;
        }

        session()->flash($type, $msg);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
