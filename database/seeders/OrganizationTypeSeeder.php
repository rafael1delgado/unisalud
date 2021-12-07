<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrganizationType;

class OrganizationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $OrganizationType = new OrganizationType();        
        $OrganizationType->name = 'Dirección Servicio de Salud';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();        
        $OrganizationType->name = 'Centro PRAIS';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();        
        $OrganizationType->name = 'Clínica Dental Móvil';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();        
        $OrganizationType->name = 'Oficina Sanitaria';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();        
        $OrganizationType->name = 'Hospital (Alta Complejidad)';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();        
        $OrganizationType->name = 'Clínica';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();        
        $OrganizationType->name = 'Hospital (No perteneciente al SNSS)';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();        
        $OrganizationType->name = 'Centro de Salud';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();        
        $OrganizationType->name = 'Clínica Dental';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();        
        $OrganizationType->name = 'Laboratorio Clínico o Dentals';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();        
        $OrganizationType->name = 'Consultorio General Urbano (CGU)';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();        
        $OrganizationType->name = 'Centro de Salud Familiar (CESFAM)';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();        
        $OrganizationType->name = 'Posta de Salud Rural (PSR)';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();        
        $OrganizationType->name = 'Centro Comunitario de Salud Mental (COSAM)';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();        
        $OrganizationType->name = 'Pendiente de clasificar';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();        
        $OrganizationType->name = 'Centro Comunitario de Salud Familiar (CECOSF)';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();
        $OrganizationType->name = 'Centro Médico y Dental';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();
        $OrganizationType->name = 'Vacunatorio';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();
        $OrganizationType->name = 'Centro de Diálisis';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();
        $OrganizationType->name = 'Servicio de Urgencia de APS';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();
        $OrganizationType->name = 'Sala de Procedimientos Odontológicos Móvil (SPOM)';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();
        $OrganizationType->name = 'Hospital (Baja Complejidad)';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();
        $OrganizationType->name = 'Hospital (Mediana Complejidad)';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();
        $OrganizationType->name = 'Consultorio de Diagnóstico y Tratamiento';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();
        $OrganizationType->name = 'Centro de Referencia de Salud';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();
        $OrganizationType->name = 'Centro Corporación para la Nutrición Infantil';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();
        $OrganizationType->name = 'Sala de Procedimientos - Vacunatorio';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();
        $OrganizationType->name = 'Dispositivo Incorporado por Crisis Sanitaria';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();
        $OrganizationType->name = 'Hospital de Dia';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();
        $OrganizationType->name = 'Centro de Especialidades Primarias';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();
        $OrganizationType->name = 'Hospital Digital';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();
        $OrganizationType->name = 'Centro de Regulación Médica de las Urgencias (SAMU)';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();
        $OrganizationType->name = 'Servicio Médico Legal';
        $OrganizationType->save();

        $OrganizationType = new OrganizationType();
        $OrganizationType->name = 'Puesto de Atención Médica de Emergencia (PAME) Incorporado por Crisis Sanitaria';
        $OrganizationType->save();

    }
}
