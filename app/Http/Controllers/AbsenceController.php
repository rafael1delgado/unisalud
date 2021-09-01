<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use Illuminate\Http\Request;
// use App\Imports\AbsencesImport;
// use Maatwebsite\Excel\Facades\Excel;
// use Maatwebsite\Excel\HeadingRowImport;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('absences.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('absences.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Absence::create($request->all());
        return redirect()->route('absences.create')->with('success', 'Se han guardado la nueva ausencia satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function show(Absence $absence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function edit(Absence $absence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absence $absence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absence $absence)
    {
        $absence->delete();
        return redirect()->route('absences.index')->with('success', 'Se han eliminado la ausencia satisfactoriamente');
    }

    public function import(Request $request)
    {
        // $request->validate(['file' => 'required'], [ 'file.required' => 'Archivo es requerido.']);
        // // Se verifica que los nombres de encabezado sean los correctos
        // $headingsRequired = ["rut","dv","nombre","ley","edadanos","edadmeses","afp","salud","codigo_unidad","nombre_unidad","genero","cargo","calidad_juridica","planta","n_resolucion","fresolucion","finicio","ftermino","total_dias_ausentismo","ausentismo_en_el_periodo","costo_de_licencia","tipo_de_ausentismo","codigo_de_establecimiento","nombre_de_establecimiento","saldo_dias_no_reemplazados","tipo_de_contrato"];
        // $headingsImported = (new HeadingRowImport)->toCollection(request()->file('file'))->flatten();
        // foreach($headingsRequired as $key => $hr)
        //     if(!isset($headingsImported[$key]) || $hr != $headingsImported[$key])
        //         return redirect()->route('absences.create')->withErrors('Archivo no cuenta con los encabezados correctos');

        // // return $headingsImported;

        // try{
        //     // Excel::import(new AbsencesImport, request()->file('file'), null, \Maatwebsite\Excel\Excel::XLSX);
        //     $import = new AbsencesImport();
        //     $import->import(request()->file('file'));

        //     dd($import->failures());
        //     return redirect()->route('absences.create')->with('success', 'Se han guardado las nuevas ausencias satisfactoriamente');
        // }catch (\Maatwebsite\Excel\Validators\ValidationException $e){
        //     $errors = $e->failures();
        //     return redirect()->route('absences.create')->withErrors($errors);
     
        //     // foreach ($failures as $failure) {
        //     //     $failure->row(); // row that went wrong
        //     //     $failure->attribute(); // either heading key (if using heading row concern) or column index
        //     //     $failure->errors(); // Actual error messages from Laravel validator
        //     //     $failure->values(); // The values of the row that has failed.
        //     // }
        // }
    }
}
