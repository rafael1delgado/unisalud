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
    return array(
        'VLmensaje' => 'Se encontro SIC: ' . $request['pcsNumSicGes'],
    );
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