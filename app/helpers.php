<?php

use App\Models\Some\ExternalIncomingSic;
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

    $externalIncomingSic->num_sic = $request['pciNumSic'];
    $externalIncomingSic->num_sic_ges = $request['pciNumSicGes'];
    $externalIncomingSic->fecha_solic = $request['pcdFechaSolic'];
    $externalIncomingSic->hora_solic = $request['pcsHoraSolic'];
    $externalIncomingSic->fecha_digitacion = $request['pcsFechaDigitacion'];
    $externalIncomingSic->hora_digitacion = $request['pcsHoraDigitacion'];
    $externalIncomingSic->cod_ssalud = $request['pcsCodSSalud'];
    $externalIncomingSic->cod_estab = $request['pcsCodEstab'];
    $externalIncomingSic->cod_espec = $request['pcsCodEspec'];
    $externalIncomingSic->nombre_pac = $request['pcsNombrePac'];
    $externalIncomingSic->apellido_pat = $request['pcsApellidoPat'];
    $externalIncomingSic->apellido_mat = $request['pcsApellidoMat'];
    $externalIncomingSic->tipo_documento = $request['pciTipoDocumento'];
    $externalIncomingSic->rut_pac = $request['pciRutPac'];
    $externalIncomingSic->dig_ver_pac = $request['pcsDigVerPac'];
    $externalIncomingSic->num_documento = $request['pcsNumDocumento'];
    $externalIncomingSic->ind_sexo_pac = $request['pcsIndSexoPac'];
    $externalIncomingSic->fech_nac_pac = $request['pcdFechNacPac'];
    $externalIncomingSic->domicilio_pac = $request['pcsDomicilioPac'];
    $externalIncomingSic->tipo_via = $request['pcsTipoVia'];
    $externalIncomingSic->nombre_via = $request['pcsNombreVia'];
    $externalIncomingSic->cod_comuna_pac = $request['pcsCodComunaPac'];
    $externalIncomingSic->telefono1 = $request['pciTelefono1'];
    $externalIncomingSic->telefono2 = $request['pciTelefono2'];
    $externalIncomingSic->cod_estab_der = $request['pcsCodEstabDer'];
    $externalIncomingSic->cod_espec_der = $request['pcsCodEspecDer'];
    $externalIncomingSic->ind_motivo = $request['pciIndMotivo'];
    $externalIncomingSic->det_motivo_consulta = $request['pcsDetMotivoConsulta'];
    $externalIncomingSic->nom_hip_diag = $request['pcsNomHipDiag'];
    $externalIncomingSic->cod_diag = $request['pcsCodDiag'];
    $externalIncomingSic->ind_auge = $request['pcsIndAuge'];
    $externalIncomingSic->nom_problem_auge = $request['pcsNomProblemAuge'];
    $externalIncomingSic->sub_problem_auge = $request['pcsSubProblemAuge'];
    $externalIncomingSic->nom_fund_diag = $request['pcsNomFundDiag'];
    $externalIncomingSic->nom_examen = $request['pcsNomExamen'];
    $externalIncomingSic->cod_rut_prof = $request['pciCodRutProf'];
    $externalIncomingSic->dv_rut_prof = $request['pcsDvRutProf'];
    $externalIncomingSic->nombre_prof = $request['pcsNombreProf'];
    $externalIncomingSic->ape_pat_prof = $request['pcsApePatProf'];
    $externalIncomingSic->ape_mat_prof = $request['pcsApeMatProf'];
    $externalIncomingSic->titulo_prof = $request['pcsTituloProf'];
    $externalIncomingSic->ind_urgencia = $request['pcsIndUrgencia'];
    $externalIncomingSic->rut_titular = $request['pciRutTitular'];
    $externalIncomingSic->dig_ver_tit = $request['pcsDigVerTit'];
    $externalIncomingSic->nombre_tit = $request['pcsNombreTit'];
    $externalIncomingSic->ape_pat_tit = $request['pcsApePatTit'];
    $externalIncomingSic->ape_mat_tit = $request['pcsApeMatTit'];
    $externalIncomingSic->sistema_previsional = $request['pcsSistemaPrevisional'];
    $externalIncomingSic->ind_previs = $request['pcsIndPrevis'];
    $externalIncomingSic->venc_prev = $request['pcdVencPrev'];
    $externalIncomingSic->num_fonasa = $request['pciNumFonasa'];
    $externalIncomingSic->rut_ins = $request['pciRutIns'];
    $externalIncomingSic->prais = $request['pciPrais'];
    $externalIncomingSic->nombre_social = $request['pcsNombreSocial'];
    $externalIncomingSic->nombre_tutor = $request['pcsNombreTutor'];
    $externalIncomingSic->email = $request['pcsEmail'];
    $externalIncomingSic->nacionalidad = $request['pcsNacionalidad'];
    $externalIncomingSic->etnia = $request['pcsEtnia'];
    $externalIncomingSic->estado_civil = $request['pcsEstadoCivil'];
    $externalIncomingSic->save();

    return array(
        'indEstado' => 1,
        'codValor' => 'Ingresado correctamente',
        'descripcion' => 'Descripcion de prueba'
    );
}