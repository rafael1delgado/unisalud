<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Samu\Key;

class SamuKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Key::create(['key'=>'101','name'=>'PATOLOGIA CARDIOVASCULAR']);
        Key::create(['key'=>'101A','name'=>'PARO CARDIORESPIRATORIO']);
        Key::create(['key'=>'101B','name'=>'TAQUIARITMIAS']);
        Key::create(['key'=>'101C','name'=>'BRADIARRITMIAS']);
        Key::create(['key'=>'101D','name'=>'SINDROME CORONARIO AGUDO']);
        Key::create(['key'=>'101E','name'=>'EDEMA AGUDO DE PULMON']);
        Key::create(['key'=>'101F','name'=>'HIPERTENSION DESCOMPENSADA']);
        Key::create(['key'=>'101G','name'=>'LIPOTIMIA']);
        Key::create(['key'=>'101H','name'=>'DOLOR TORAXICO']);
        Key::create(['key'=>'101I','name'=>'SINCOPE']);
        Key::create(['key'=>'101N','name'=>'OTROS']);
        Key::create(['key'=>'102','name'=>'ALTERACIONES RESPIRATORIAS']);
        Key::create(['key'=>'102A','name'=>'PARO RESPIRATORIO']);
        Key::create(['key'=>'102B','name'=>'DISNEA']);
        Key::create(['key'=>'102C','name'=>'L.C.F.A. DESCOMPENSADA']);
        Key::create(['key'=>'102D','name'=>'CRISIS ASMATICA']);
        Key::create(['key'=>'102E','name'=>'SINDROME BRONQUIAL OBSTRUCTIVO']);
        Key::create(['key'=>'102F','name'=>'NEUMONIA']);
        Key::create(['key'=>'102N','name'=>'OTROS']);
        Key::create(['key'=>'103','name'=>'ALTERACIONES DIGESTIVAS']);
        Key::create(['key'=>'103A','name'=>'DOLOR ABDOMINAL SEVERO']);
        Key::create(['key'=>'103B','name'=>'HEMATEMESIS']);
        Key::create(['key'=>'103C','name'=>'RECTORRAGIA']);
        Key::create(['key'=>'103D','name'=>'DIARREA']);
        Key::create(['key'=>'103E','name'=>'NAUSEAS Y VOMITOS']);
        Key::create(['key'=>'103N','name'=>'OTROS']);
        Key::create(['key'=>'104','name'=>'ALTERACIONES GINECO-OBSTETRAS']);
        Key::create(['key'=>'104A','name'=>'TRABAJO DE PARTO']);
        Key::create(['key'=>'104B','name'=>'METRORRAGIA']);
        Key::create(['key'=>'104C','name'=>'PARTO EXTRA HOSP. ATENCION R.N.']);
        Key::create(['key'=>'104D','name'=>'ABORTO EN EVOLUCION']);
        Key::create(['key'=>'104E','name'=>'ABUSO SEXUAL']);
        Key::create(['key'=>'104N','name'=>'OTROS']);
        Key::create(['key'=>'105','name'=>'ALTERACIONES S.N.C.']);
        Key::create(['key'=>'105A','name'=>'COMPROMISO DE CONCIENCIA']);
        Key::create(['key'=>'105B','name'=>'CONVULSIONES']);
        Key::create(['key'=>'105C','name'=>'TEC EN EVOLUCION']);
        Key::create(['key'=>'105N','name'=>'OTROS']);
        Key::create(['key'=>'106','name'=>'ALTERACIONES GENITOURINARIAS']);
        Key::create(['key'=>'106A','name'=>'COLICO RENAL']);
        Key::create(['key'=>'106B','name'=>'PROBLEMA C/ CATETER URINARIO']);
        Key::create(['key'=>'106C','name'=>'OBST. VIA URINARIA']);
        Key::create(['key'=>'106D','name'=>'INFECCION URINARIA']);
        Key::create(['key'=>'106N','name'=>'OTROS']);
        Key::create(['key'=>'107','name'=>'ALTERACIONES METABOLICAS']);
        Key::create(['key'=>'107A','name'=>'HIPOGLICEMIA']);
        Key::create(['key'=>'107B','name'=>'HIPERGLICEMIA']);
        Key::create(['key'=>'107C','name'=>'DESHIDRATACION']);
        Key::create(['key'=>'107N','name'=>'OTROS']);
        Key::create(['key'=>'108','name'=>'ALTERACIONES PSIQUIATRICAS']);
        Key::create(['key'=>'108A','name'=>'INTENTO SUICIDIO']);
        Key::create(['key'=>'108B','name'=>'CRISIS AGITACION PSICOMOTRIZ']);
        Key::create(['key'=>'108C','name'=>'ESQUIZOFRENICO AGITADO']);
        Key::create(['key'=>'108D','name'=>'CRISIS DE PANICO']);
        Key::create(['key'=>'108E','name'=>'TRASTORNO ANSIOSO CONVERSIVO']);
        Key::create(['key'=>'108N','name'=>'OTROS']);
        Key::create(['key'=>'109','name'=>'PATOLOGIAS NO PRECISADAS']);
        Key::create(['key'=>'109A','name'=>'CANCER TERMINAL']);
        Key::create(['key'=>'109B','name'=>'PACIENTE POSTRADO']);
        Key::create(['key'=>'109C','name'=>'PACIENTE FEBRIL']);
        Key::create(['key'=>'109D','name'=>'ANAFILAXIA']);
        Key::create(['key'=>'109N','name'=>'OTROS']);
        Key::create(['key'=>'201','name'=>'ACCIDENTE VEHICULAR']);
        Key::create(['key'=>'201A','name'=>'COLISION']);
        Key::create(['key'=>'201B','name'=>'CHOQUE']);
        Key::create(['key'=>'201C','name'=>'VOLCAMIENTO']);
        Key::create(['key'=>'201D','name'=>'ATROPELLO']);
        Key::create(['key'=>'201E','name'=>'CAIDA VEHICULO EN MOVIMIENTO']);
        Key::create(['key'=>'201N','name'=>'OTROS']);
        Key::create(['key'=>'301','name'=>'INTOX. Y ENVENENAMIENTO']);
        Key::create(['key'=>'301A','name'=>'INTOXICACION DROGAS']);
        Key::create(['key'=>'301B','name'=>'INTOXICACION FARMACOS']);
        Key::create(['key'=>'301C','name'=>'INTOXICACION ALCOHOL AGUDA']);
        Key::create(['key'=>'301D','name'=>'INTOXICACION GASES, VENENOS,  QUIMICOS.']);
        Key::create(['key'=>'301N','name'=>'OTROS']);
        Key::create(['key'=>'401','name'=>'HERIDAS']);
        Key::create(['key'=>'401A','name'=>'HERIDA CORTO PUNZANTE']);
        Key::create(['key'=>'401B','name'=>'HERIDA ARMA DE FUEGO']);
        Key::create(['key'=>'401C','name'=>'HERIDA CONTUSA']);
        Key::create(['key'=>'401D','name'=>'APLASTAMIENTO']);
        Key::create(['key'=>'401E','name'=>'ATRICCION']);
        Key::create(['key'=>'401F','name'=>'FRACTURAS']);
        Key::create(['key'=>'401N','name'=>'OTROS']);
        Key::create(['key'=>'402','name'=>'CAIDAS']);
        Key::create(['key'=>'402A','name'=>'CAIDA A NIVEL']);
        Key::create(['key'=>'402B','name'=>'CAIDA DE ALTURA']);
        Key::create(['key'=>'402C','name'=>'RODADA']);
        Key::create(['key'=>'402N','name'=>'OTROS']);
        Key::create(['key'=>'403','name'=>'QUEMADURAS']);
        Key::create(['key'=>'403A','name'=>'QUEMADURAS POR FUEGO']);
        Key::create(['key'=>'403B','name'=>'QUEMADURAS LIQUIDOS CALIENTES']);
        Key::create(['key'=>'403C','name'=>'QUEMADURA QUIMICOS']);
        Key::create(['key'=>'403D','name'=>'ELECTROCUCION']);
        Key::create(['key'=>'403N','name'=>'OTROS']);
        Key::create(['key'=>'501','name'=>'ASFIXIA']);
        Key::create(['key'=>'501A','name'=>'INMERSION']);
        Key::create(['key'=>'501B','name'=>'AHORCAMIENTO']);
        Key::create(['key'=>'501N','name'=>'OTROS']);
        Key::create(['key'=>'701','name'=>'TRASLADOS']);
        Key::create(['key'=>'701A','name'=>'HEMODINAMIA']);
        Key::create(['key'=>'701B','name'=>'DIALISIS']);
        Key::create(['key'=>'701C','name'=>'ALTA']);
        Key::create(['key'=>'701D','name'=>'EXAMENES']);
        Key::create(['key'=>'701E','name'=>'INTERCONSULTA']);
        Key::create(['key'=>'701F','name'=>'AEROPUERTO']);
        Key::create(['key'=>'701G','name'=>'OTRO CENTRO ASISTENCIAL']);
        Key::create(['key'=>'701N','name'=>'OTROS']);
        Key::create(['key'=>'600','name'=>'FALLECIDO']);
        Key::create(['key'=>'605','name'=>'TRAMITE NO MEDICO']);
        Key::create(['key'=>'606','name'=>'REPOSICION DE COMBUSTIBLE']);
    }
}
