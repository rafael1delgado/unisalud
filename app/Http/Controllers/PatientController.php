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
        //http://fhir-ssiq.cens.cl/ssiq/fhir/patient
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

        /* Previsión */
        $url = $this->getUrlBase().'ValueSet/health-insurance';
        $response = Http::withToken($this->getToken())->get($url);
        $previciones = $response->json()['compose']['include'][0]['concept'];

        /* Comunas */
        $url = $this->getUrlBase().'ValueSet/commune';
        $response = Http::withToken($this->getToken())->get($url);
        $communes = $response->json()['compose']['include'][0]['concept'];

        /* Regiones */
        $url = $this->getUrlBase().'ValueSet/region';
        $response = Http::withToken($this->getToken())->get($url);
        $regions = $response->json()['compose']['include'][0]['concept'];

        /* Pueblos originarios */
        $url = $this->getUrlBase().'ValueSet/aboriginal-community';
        $response = Http::withToken($this->getToken())->get($url);
        $aboriginals = $response->json()['compose']['include'][0]['concept'];

        /* Vias de acceso */
        $url = $this->getUrlBase().'ValueSet/street-type';
        $response = Http::withToken($this->getToken())->get($url);
        $streetTypes = $response->json()['compose']['include'][0]['concept'];

        /* Estado civil */
        $url = $this->getUrlBase().'ValueSet/marital-status';
        $response = Http::withToken($this->getToken())->get($url);
        $maritalStatus = $response->json()['compose']['include'][0]['concept'];

        /*
        https://fhir-ssiq.cens.cl/ssiq/fhir/ValueSet/health-insurance
        https://fhir-ssiq.cens.cl/ssiq/fhir/ValueSet/religious-affiliation
        */
        return view('patients.create', compact('instructionLevel',
            'genderIdentities','previciones','communes','regions','aboriginals',
            'streetTypes','maritalStatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Obtener pacientes desde Fhir */
        $url = $this->getUrlBase().'Patient';

        $array_name = explode(' ', $request->input('name'));

        $data = [
            'name' => [
                0 => [
                    'use' => 'official',
                    'family' => $array_name[1],
                    'given' => [0 => $array_name[0] ],
                ],
            ],
            'gender' => $request->input('gender'),
            'birthDate' => $request->input('birthDate'),
            'resourceType' => 'Patient',
        ];
        $response = Http::withToken($this->getToken())->post($url, $data);

        return redirect()->route('patient.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
