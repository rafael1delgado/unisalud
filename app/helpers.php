<?php

use App\Models\some\ExternalIncomingSic;
use \Carbon\Carbon;

function active($route_name) { 
    echo request()->routeIs($route_name) ? 'active' : '';
}

function fdatetime($string) {
    return Carbon::createFromFormat('Y-m-d\TH:i:sP', $string)->format('d-m-Y H:i'); 
}

//Funciones para WS SOAP Rayen
function BuscarSic($request){
    $externalIncomingSic = ExternalIncomingSic::query()
    ->where('pciNumSicGes', $request['pcsNumSicGes'])
    ->where('pcsCodEstab', $request['pcsCodEstab'])
    ->first();

    if($externalIncomingSic){
        return array(
            'VLmensaje' => 'Se encontro SIC numSicGes: ' . $externalIncomingSic->pciNumSicGes . ' codEstab: ' . $externalIncomingSic->pcsCodEstab,
        );
    } 
    else {
        return array(
            'VLmensaje' => 'No se encontro SIC con numSicGes: ' . $request['pcsNumSicGes'] . ' codEstab:' . $request['pcsCodEstab'],
        );
    }
}

function GuardarSic($request){
    $externalIncomingSic = new ExternalIncomingSic();
    $externalIncomingSic->fill($request);
    $externalIncomingSic->save();

    return array(
        'indEstado' => 1,
        'codValor' => 'Ingresado correctamente',
        'descripcion' => 'Descripcion de prueba'
    );
}