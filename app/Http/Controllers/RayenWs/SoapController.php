<?php

namespace App\Http\Controllers\RayenWs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use soap_server;

class SoapController extends Controller
{

    public function server(){

        //LOGIN
        if(!isset($_SERVER['PHP_AUTH_USER'])){
            header('WWW-Authenticate: Basic reaml="MiSoap"');
            header('HTTP/1.0 401 Unauthorized');
            exit;
        }

        if($_SERVER['PHP_AUTH_USER'] == env('SOAP_USER') && $_SERVER['PHP_AUTH_PW'] == env('SOAP_PASSWORD') ){
            header('Content-Type: application/soap+xml; charset=utf-8');
            // return true;
        }
        else{
            header('WWW-Authenticate: Basic reaml="MiSoap"');
            header('HTTP/1.0 401 Unauthorized');
            exit;
        }

        //DEFINICION WS
        $namespace = 'wsSicNamespace';
        $server = new soap_server();
        // $server->configureWSDL('wsSIC', $namespace, 'http://localhost/soap/rayen');
        $server->configureWSDL('wsSIC', $namespace, 'https://www.saludiquique.app/soap/rayen');
        $server->wsdl->schemaTargetNamespace = $namespace;

        $server->wsdl->addComplexType(
            'datos_entrada_buscarSicGes', 
            'complexType',
            'struct',
            'all',
            '',
            array(
               'pcsNumSicGes' => array('name' => 'pcsNumSicGes', 'type' => 'xsd:string'),
               'pcsCodEstab' => array('name' => 'pcsCodEstab', 'type' => 'xsd:string')
            )
        );

        $server->wsdl->addComplexType(
            'datos_salida_buscarSicGes',
            'complexType',
            'struct',
            'all',
            '',
            array(
               'VLmensaje' => array('name' => 'VLmensaje', 'type' => 'xsd:string'),
            )
        );

        $server->wsdl->addComplexType(
            'datos_entrada_GuardarSicGes',
            'complexType',
            'struct',
            'all',
            '',
            array(
               'pciNumSic' => array('name' => 'pciNumSic', 'type' => 'xsd:int'),
               'pciNumSicGes' => array('name' => 'pciNumSicGes', 'type' => 'xsd:int'),
               'pcdFechaSolic' => array('name' => 'pcdFechaSolic', 'type' => 'xsd:date'),
               'pcsHoraSolic' => array('name' => 'pcsHoraSolic', 'type' => 'xsd:string'),
               'pcsFechaDigitacion' => array('name' => 'pcsFechaDigitacion', 'type' => 'xsd:date'),
               'pcsHoraDigitacion' => array('name' => 'pcsHoraDigitacion', 'type' => 'xsd:string'),
               'pcsCodSSalud' => array('name' => 'pcsCodSSalud', 'type' => 'xsd:string'),
               'pcsCodEstab' => array('name' => 'pcsCodEstab', 'type' => 'xsd:string'),
               'pcsCodEspec' => array('name' => 'pcsCodEspec', 'type' => 'xsd:string'),
               'pcsNombrePac' => array('name' => 'pcsNombrePac', 'type' => 'xsd:string'),
               'pcsApellidoPat' => array('name' => 'pcsApellidoPat', 'type' => 'xsd:string'),
               'pcsApellidoMat' => array('name' => 'pcsApellidoMat', 'type' => 'xsd:string'),
               'pciTipoDocumento' => array('name' => 'pciTipoDocumento', 'type' => 'xsd:int'),
               'pciRutPac' => array('name' => 'pciRutPac', 'type' => 'xsd:int'),
               'pcsDigVerPac' => array('name' => 'pcsDigVerPac', 'type' => 'xsd:string'),
               'pcsNumDocumento' => array('name' => 'pcsNumDocumento', 'type' => 'xsd:string'),
               'pcsIndSexoPac' => array('name' => 'pcsIndSexoPac', 'type' => 'xsd:string'),
               'pcdFechNacPac' => array('name' => 'pcdFechNacPac', 'type' => 'xsd:date'),
               'pcsDomicilioPac' => array('name' => 'pcsDomicilioPac', 'type' => 'xsd:string'),
               'pcsTipoVia' => array('name' => 'pcsTipoVia', 'type' => 'xsd:string'),
               'pcsNombreVia' => array('name' => 'pcsTipoVia', 'type' => 'xsd:string'),
               'pcsCodComunaPac' => array('name' => 'pcsCodComunaPac', 'type' => 'xsd:string'),
               'pciTelefono1' => array('name' => 'pciTelefono1', 'type' => 'xsd:int'),
               'pciTelefono2' => array('name' => 'pciTelefono1', 'type' => 'xsd:int'),
               'pcsCodEstabDer' => array('name' => 'pcsCodEstabDer', 'type' => 'xsd:string'),
               'pcsCodEspecDer' => array('name' => 'pcsCodEspecDer', 'type' => 'xsd:string'),
               'pciIndMotivo' => array('name' => 'pciIndMotivo', 'type' => 'xsd:int'),
               'pcsDetMotivoConsulta' => array('name' => 'pcsDetMotivoConsulta', 'type' => 'xsd:string'),
               'pcsNomHipDiag' => array('name' => 'pcsNomHipDiag', 'type' => 'xsd:string'),
               'pcsCodDiag' => array('name' => 'pcsCodDiag', 'type' => 'xsd:string'),
               'pcsIndAuge' => array('name' => 'pcsIndAuge', 'type' => 'xsd:string'),
               'pcsNomProblemAuge' => array('name' => 'pcsNomProblemAuge', 'type' => 'xsd:string'),
               'pcsSubProblemAuge' => array('name' => 'pcsSubProblemAuge', 'type' => 'xsd:string'),
               'pcsNomFundDiag' => array('name' => 'pcsNomFundDiag', 'type' => 'xsd:string'),
               'pcsNomExamen' => array('name' => 'pcsNomExamen', 'type' => 'xsd:string'),
               'pciCodRutProf' => array('name' => 'pciCodRutProf', 'type' => 'xsd:int'),
               'pcsDvRutProf' => array('name' => 'pcsDvRutProf', 'type' => 'xsd:string'),
               'pcsNombreProf' => array('name' => 'pcsNombreProf', 'type' => 'xsd:string'),
               'pcsApePatProf' => array('name' => 'pcsApePatProf', 'type' => 'xsd:string'),
               'pcsApeMatProf' => array('name' => 'pcsApeMatProf', 'type' => 'xsd:string'),
               'pcsTituloProf' => array('name' => 'pcsTituloProf', 'type' => 'xsd:string'),
               'pcsIndUrgencia' => array('name' => 'pcsIndUrgencia', 'type' => 'xsd:string'),
               'pciRutTitular' => array('name' => 'pciRutTitular', 'type' => 'xsd:int'),
               'pcsDigVerTit' => array('name' => 'pcsDigVerTit', 'type' => 'xsd:string'),
               'pcsNombreTit' => array('name' => 'pcsNombreTit', 'type' => 'xsd:string'),
               'pcsApePatTit' => array('name' => 'pcsApePatTit', 'type' => 'xsd:string'),
               'pcsApeMatTit' => array('name' => 'pcsApeMatTit', 'type' => 'xsd:string'),
               'pcsSistemaPrevisional' => array('name' => 'pcsSistemaPrevisional', 'type' => 'xsd:string'),
               'pcsIndPrevis' => array('name' => 'pcsIndPrevis', 'type' => 'xsd:string'),
               'pcdVencPrev' => array('name' => 'pcdVencPrev', 'type' => 'xsd:date'),
               'pciNumFonasa' => array('name' => 'pciNumFonasa', 'type' => 'xsd:int'),
               'pciRutIns' => array('name' => 'pciRutIns', 'type' => 'xsd:int'),
               'pciPrais' => array('name' => 'pciPrais', 'type' => 'xsd:int'),
               'pcsNombreSocial' => array('name' => 'pcsNombreSocial', 'type' => 'xsd:string'),
               'pcsNombreTutor' => array('name' => 'pcsNombreTutor', 'type' => 'xsd:string'),
               'pcsEmail' => array('name' => 'pcsEmail', 'type' => 'xsd:string'),
               'pcsNacionalidad' => array('name' => 'pcsNacionalidad', 'type' => 'xsd:string'),
               'pcsEtnia' => array('name' => 'pcsEtnia', 'type' => 'xsd:string'),
               'pcsEstadoCivil' => array('name' => 'pcsEstadoCivil', 'type' => 'xsd:string'),
            )
        );

        $server->wsdl->addComplexType(
            'tduConfirma',
            'complexType',
            'struct',
            'all',
            '',
            array(
               'indEstado' => array('name' => 'indEstado', 'type' => 'xsd:boolean'),
               'codValor' => array('name' => 'codValor', 'type' => 'xsd:string'),
               'descripcion' => array('name' => 'descripcion', 'type' => 'xsd:string'),
            )
        );

        //La definición de estos métodos que se registran acá estan en helpers.php
        $server->register(
            'BuscarSic', 
            array('name' => 'tns:datos_entrada_buscarSicGes'),
            array('return' => 'tns:datos_salida_buscarSicGes'),
            $namespace,
            false,
            'rpc',
            'encoded',
            'Entrega el Estado de la SIC (Entrega detalle si paciente fue: CITADO, LISTA ESPERA, RECHAZADO, PENDIENTE). Parametros para la busqueda: Datos que se deben enviar son: EL NUMERO DE LA SICGES Y EL CODIGO DEL ESTABLECIMIENTO.'
        );

        $server->register(
            'GuardarSIC', 
            array('name' => 'tns:datos_entrada_GuardarSicGes'),
            array('return' => 'tns:tduConfirma'),
            $namespace,
            false,
            'rpc',
            'encoded',
            'Guarda una SIC en la BD del Hospital Regional de Iquique (SI EXISTE SIC ACTUALIZA LOS SIGUIENTES DATOS: Nombre Paciente,Apellido Paterno Paciente,Apellido Materno Paciente Telefono1, telefono2, Direccion del paciente; SI NO EXISTIERA LA SIC: INSERTA LOS DATOS REQUERIDOS)'
        );

        $POST_DATA = file_get_contents("php://input");
        return \Response::make($server->service($POST_DATA), 200, array('Content-Type' => 'text/xml; charset=ISO-8859-1'));
    }

}