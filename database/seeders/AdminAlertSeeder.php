<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminAlert;

class AdminAlertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        AdminAlert::Create(['name' => 'Chile Crece Contigo']);
        AdminAlert::Create(['name' => 'Chile Solidario']);
        AdminAlert::Create(['name' => 'CONACE']);
        AdminAlert::Create(['name' => 'Fonasa modalidad Atención Institucional']);
        AdminAlert::Create(['name' => 'Fonasa modalidad Libre ElecciónFonasa modalidad Libre Elección']);
        AdminAlert::Create(['name' => 'Habilidades para la Vida']);
        AdminAlert::Create(['name' => 'Hogar de Cristo']);
        AdminAlert::Create(['name' => 'I.P.S']);
        AdminAlert::Create(['name' => 'Ingreso Etico Familiar']);
        AdminAlert::Create(['name' => 'INTEGRA']);
        AdminAlert::Create(['name' => 'Jubilación de Vejez (Edad)']);
        AdminAlert::Create(['name' => 'JUNAEB']);
        AdminAlert::Create(['name' => 'JUNJI']);
        AdminAlert::Create(['name' => 'Ley 16.744 Accidente Escolar']);
        AdminAlert::Create(['name' => 'Ley 16.744 Acidentes del trabajo y enfermedades profesionales']);
        AdminAlert::Create(['name' => 'Ley 18.490 Accidentes de Transporte (Seguro obligatorio contra terceros)']);
        AdminAlert::Create(['name' => 'Ley 19.650/99 de Urgencia']);
        AdminAlert::Create(['name' => 'Ley 19.966 Ges Régimen General de Garantías de Salud']);
        AdminAlert::Create(['name' => 'Ley 19.992 PRAIS']);
        AdminAlert::Create(['name' => 'MIGRANTE']);
        AdminAlert::Create(['name' => 'MINEDUC']);
        AdminAlert::Create(['name' => 'MINVU']);
        AdminAlert::Create(['name' => 'Otras Pensiones']);
        AdminAlert::Create(['name' => 'Otro programa social']);
        AdminAlert::Create(['name' => 'P.E.S.P.I.']);
        AdminAlert::Create(['name' => 'PASIS']);
        AdminAlert::Create(['name' => 'Pensión de Gracia']);
        AdminAlert::Create(['name' => 'Pensión de Inválidez']);
        AdminAlert::Create(['name' => 'Pensión de Montepío']);
        AdminAlert::Create(['name' => 'Pensión de Orfandad']);
        AdminAlert::Create(['name' => 'Pensión de Sobrevivencia']);
        AdminAlert::Create(['name' => 'PRODEMU']);
        AdminAlert::Create(['name' => 'Programa SENAME - Ambulatorios']);
        AdminAlert::Create(['name' => 'Programa SENAME – CIP/CRC']);
        AdminAlert::Create(['name' => 'Programa SENAME – Residenciales']);
        AdminAlert::Create(['name' => 'Senadis']);
        AdminAlert::Create(['name' => 'SERNAM']);
        AdminAlert::Create(['name' => 'SUF (Subsidio único familiar)']);
    }
}
