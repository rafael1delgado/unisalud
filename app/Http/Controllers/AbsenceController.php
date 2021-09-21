<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use Illuminate\Http\Request;
use App\Imports\AbsencesImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use Barryvdh\Debugbar\Facade as Debugbar;

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

    public function load()
    {
        return view ('absences.load');
    }

    public function import(Request $request)
    {
        $start = microtime(true);
        $request->validate(['file' => 'required'], [ 'file.required' => 'Archivo es requerido.']);
        // Se verifica que los nombres de encabezado sean los correctos
        $headingsRequired = ["rut","dv","nombre","ley","edadanos","edadmeses","afp","salud","codigo_unidad","nombre_unidad","genero","cargo","calidad_juridica","planta","n_resolucion","fresolucion","finicio","ftermino","total_dias_ausentismo","ausentismo_en_el_periodo","costo_de_licencia","tipo_de_ausentismo","codigo_de_establecimiento","nombre_de_establecimiento","saldo_dias_no_reemplazados","tipo_de_contrato"];
        $headingsImported = (new HeadingRowImport)->toCollection(request()->file('file'))->flatten();
        foreach($headingsRequired as $key => $hr)
            if(!isset($headingsImported[$key]) || $hr != $headingsImported[$key])
                return redirect()->route('absences.load')->withErrors('Archivo no cuenta con los encabezados correctos');

        // return $headingsImported;

        $import = new AbsencesImport();
        $file = request()->file('file');
        $import->import($file);
        $results = array($file->getClientOriginalName(), $this->bytesToHuman($file->getSize()), $import->getRowCount(), $import->getTotalRowCount() - 1, round(microtime(true) - $start, 2));
        
        return redirect()->route('absences.load')->with('success', 'Se han procesado correctamente el archivo a importar.')->with(['failures' => $import->failures(), 'results' => $results]);
    }

    public function bytesToHuman($bytes)
    {
        $units = ['B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
}
