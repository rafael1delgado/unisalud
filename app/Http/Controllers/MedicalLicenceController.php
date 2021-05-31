<?php

namespace App\Http\Controllers;

use App\Models\RRHH\MedicalLicence;
use Illuminate\Http\Request;

class MedicalLicenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $medicalLicences =MedicalLicence::all();
        //inicio
        return view ('rrhh.medical_licence.create', compact('medicalLicences'));
        //fin
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medicalLicence=new MedicalLicence($request->all());
        $medicalLicence->save();

        return redirect()->route ('medical_licence.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RRHH\MedicalLicence  $medicalLicence
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalLicence $medicalLicence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RRHH\MedicalLicence  $medicalLicence
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalLicence $medicalLicence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RRHH\MedicalLicence  $medicalLicence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalLicence $medicalLicence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RRHH\MedicalLicence  $medicalLicence
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalLicence $medicalLicence)
    {
        //
    }
}
