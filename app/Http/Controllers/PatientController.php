<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
Use App\Traits\GoogleToken;

class PatientController extends Controller
{
    use GoogleToken;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Obtener pacientes desde Fhir */
        $url = $this->getUrlBase().'Patient';
        $response = Http::withToken($this->getToken())->get($url)->json();
        $patients = $response['entry'];

        //dd($patients);

        return view('patients.index')->withPatients($patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* Nivel de Instrucción */
        $url = $this->getUrlBase().'ValueSet/3113';
        $response = Http::withToken($this->getToken())->get($url);
        $instructionLevel = $response->json()['compose']['include'][0]['concept'];

        /* Identidad de genero */
        $url = $this->getUrlBase().'ValueSet/gender-identity';
        $response = Http::withToken($this->getToken())->get($url);
        $genderIdentities = $response->json()['compose']['include'][0]['concept'];

        /* Identidad de genero */
        $url = $this->getUrlBase().'ValueSet/vs-deis-prevision';
        $response = Http::withToken($this->getToken())->get($url);
        $previciones = $response->json()['compose']['include'][0]['concept'];

        return view('patients.create', compact('instructionLevel','genderIdentities','previciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
