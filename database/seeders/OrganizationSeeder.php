<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organization;
use App\Models\Address;


class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Organization::Create(['name'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Iquique)','alias'=>'Servicio de Salud Iquique','type'=>'Dirección Servicio de Salud','old_code_deis' => '02-010','new_code_deis' => '102010','service'=>'Servicio de Salud Iquique','dependency'=>'Servicio de Salud','commune_id'=>5]);
        //////////////////////////////////////////////////////////REGIÓN DE TARAPACÁ//////////////////////////////////////////////
        $Organization = new Organization();
        $Organization->active = 1;
        $Organization->name = 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Iquique)';
        $Organization->alias = 'Servicio de Salud Iquique';        
        $Organization->type = 1; //1 Dirección Servicio de Salud
        $Organization->code_deis = 102010;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'PRAIS (S.S. Iquique)','alias'=>'PRAIS (S.S. Iquique)','type'=>'Centro PRAIS','old_code_deis' => '02-011','new_code_deis' => '102011','service'=>'Servicio de Salud Iquique','dependency'=>'Servicio de Salud','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 2;
        $Organization->name = 'PRAIS (S.S. Iquique)';
        $Organization->alias = 'PRAIS (S.S. Iquique)';
        $Organization->type = 2; //2 Centro PRAIS
        $Organization->code_deis = 102011;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

       // Organization::Create(['name'=>'Clínica Dental Móvil Simple. Pat. RW6740 (Iquique)','alias'=>'Clínica Dental Móvil Simple. Pat. RW6740 (Iquique)','type'=>'Clínica Dental Móvil','old_code_deis' => '02-012','new_code_deis' => '102012','service'=>'Servicio de Salud Iquique','dependency'=>'Servicio de Salud','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 3;
        $Organization->name = 'Clínica Dental Móvil Simple. Pat. RW6740 (Iquique)';
        $Organization->alias = 'Clínica Dental Móvil';
        $Organization->type = 3; //3 Clínica Dental Móvil
        $Organization->code_deis = 102012;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

       // Organization::Create(['name'=>'Hospital Dr. Ernesto Torres Galdames (Iquique)','alias'=>'Hospital Dr. Ernesto Torres Galdames (Iquique)','type'=>'Hospital (Alta Complejidad)','old_code_deis' => '02-100','new_code_deis' => '102100','service'=>'Servicio de Salud Iquique','dependency'=>'Servicio de Salud','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 4;
        $Organization->name = 'Hospital Dr. Ernesto Torres Galdames (Iquique)';
        $Organization->alias = 'Hospital Dr. Ernesto Torres Galdames (Iquique)';
        $Organization->type = 5; //5 Hospital (Alta Complejidad)
        $Organization->code_deis = 102100;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Clínica Iquique','alias'=>'Clínica Iquique','type'=>'Clínica','old_code_deis' => '02-200','new_code_deis' => '102200','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 5;
        $Organization->name = 'Clínica Iquique';
        $Organization->alias = 'Clínica Iquique';
        $Organization->type = 6; //6 Clínica
        $Organization->code_deis = 102200;
        $Organization->service = 4; //3 = SEREMI de Tarapacá
        $Organization->dependency = 3; //1 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Clínica Tarapacá','alias'=>'Clínica Tarapacá','type'=>'Clínica','old_code_deis' => '02-201','new_code_deis' => '102201','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 6;
        $Organization->name = 'Clínica Tarapacá';
        $Organization->alias = 'Clínica Tarapacá';
        $Organization->type = 6; //6 Clínica
        $Organization->code_deis = 102201;
        $Organization->service = 4; //3 = SEREMI de Tarapacá
        $Organization->dependency = 3; //1 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro Clínico Militar Iquique','alias'=>'Centro Clínico Militar Iquique','type'=>'Centro de Salud','old_code_deis' => '02-209','new_code_deis' => '102209','service'=>'SEREMI De Tarapacá','dependency'=>'Público No perteneciente al SNSS','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 7;
        $Organization->name = 'Centro Clínico Militar Iquique';
        $Organization->alias = 'Centro Clínico Militar Iquique';
        $Organization->type = 8; //8 Centro de Salud
        $Organization->code_deis = 102209;
        $Organization->service = 4; //3 = SEREMI de Tarapacá
        $Organization->dependency = 5; //5 = Público No perteneciente al SNSS
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro Médico y Dental Megasalud Iquique','alias'=>'Centro Médico y Dental Megasalud Iquique','type'=>'Centro Médico y Dental','old_code_deis' => '02-213','new_code_deis' => '102213','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 8;
        $Organization->name = 'Centro Médico y Dental Megasalud Iquique';
        $Organization->alias = 'Centro Médico y Dental Megasalud Iquique';
        $Organization->type = 17; //17 Centro Médico y Dental
        $Organization->code_deis = 102213;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro de Salud Mutual CChC Iquique','alias'=>'Centro de Salud Mutual CChC Iquique','type'=>'Centro de Salud','old_code_deis' => '02-216','new_code_deis' => '102216','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 9;
        $Organization->name = 'Centro de Salud Mutual CChC Iquique';
        $Organization->alias = 'Centro de Salud Mutual CChC Iquique';
        $Organization->type = 8; //8 Centro de Salud
        $Organization->code_deis = 102216;
        $Organization->service = 4; //3 = SEREMI de Tarapacá
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Policlínico Naval de Iquique','alias'=>'Policlínico Naval de Iquique','type'=>'Centro de Salud','old_code_deis' => '02-217','new_code_deis' => '102217','service'=>'SEREMI De Tarapacá','dependency'=>'Público No perteneciente al SNSS','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 10;
        $Organization->name = 'Policlínico Naval de Iquique';
        $Organization->alias = 'Policlínico Naval de Iquique';
        $Organization->type = 8; //8 Centro de Salud
        $Organization->code_deis = 102217;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 5; //5 = Público No perteneciente al SNSS
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

       // Organization::Create(['name'=>'Policlínico FACH de Iquique','alias'=>'Policlínico FACH de Iquique','type'=>'Centro de Salud','old_code_deis' => '02-218','new_code_deis' => '102218','service'=>'SEREMI De Tarapacá','dependency'=>'Público No perteneciente al SNSS','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 11;
        $Organization->name = 'Policlínico FACH de Iquique';
        $Organization->alias = 'Policlínico FACH de Iquique';
        $Organization->type = 8; //8 Centro de Salud
        $Organization->code_deis = 102218;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 5; //5 = Público No perteneciente al SNSS
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Policlínico Carabineros de Iquique','alias'=>'Policlínico Carabineros de Iquique','type'=>'Centro de Salud','old_code_deis' => '02-219','new_code_deis' => '102219','service'=>'SEREMI De Tarapacá','dependency'=>'Público No perteneciente al SNSS','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 12;
        $Organization->name = 'Policlínico Carabineros de Iquique';
        $Organization->alias = 'Policlínico Carabineros de Iquique';
        $Organization->type = 8; //8 Centro de Salud
        $Organization->code_deis = 102219;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 5; //5 = Público No perteneciente al SNSS
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro de Atención Instituto de Seguridad del Trabajador Iquique','alias'=>'Centro de Atención Instituto de Seguridad del Trabajador Iquique','type'=>'Centro de Salud','old_code_deis' => '02-222','new_code_deis' => '102222','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 13;
        $Organization->name = 'Centro de Atención Instituto de Seguridad del Trabajador Iquique';
        $Organization->alias = 'Centro de Atención Instituto de Seguridad del Trabajador Iquique';
        $Organization->type = 8; //8 Centro de Salud
        $Organization->code_deis = 102222;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Policlínico del Trabajador AChS Iquique','alias'=>'Policlínico del Trabajador AChS Iquique','type'=>'Centro de Salud','old_code_deis' => '02-223','new_code_deis' => '102223','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 14;
        $Organization->name = 'Policlínico del Trabajador AChS Iquique';
        $Organization->alias = 'Policlínico del Trabajador AChS Iquique';
        $Organization->type = 8; //8 Centro de Salud
        $Organization->code_deis = 102223;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Vacunatorio Sonrisa Infantil','alias'=>'Vacunatorio Sonrisa Infantil','type'=>'Vacunatorio','old_code_deis' => '02-224','new_code_deis' => '102224','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 15;
        $Organization->name = 'Vacunatorio Sonrisa Infantil';
        $Organization->alias = 'Vacunatorio Sonrisa Infantil';
        $Organization->type = 18; //18 Vacunatorio
        $Organization->code_deis = 102224;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro Médico y Dental Megasalud Alto Hospicio','alias'=>'Centro Médico y Dental Megasalud Alto Hospicio','type'=>'Centro Médico y Dental','old_code_deis' => '02-225','new_code_deis' => '102225','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>7]);
        $Organization = new Organization();
        $Organization->active = 16;
        $Organization->name = 'Centro Médico y Dental Megasalud Alto Hospicio';
        $Organization->alias = 'Centro Médico y Dental Megasalud Alto Hospicio';
        $Organization->type = 17; //17 Centro Médico y Dental
        $Organization->code_deis = 102225;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro de Salud Universidad Arturo Prat','alias'=>'Centro de Salud Universidad Arturo Prat','type'=>'Centro de Salud','old_code_deis' => '02-227','new_code_deis' => '102227','service'=>'SEREMI De Tarapacá','dependency'=>'Otra Institución','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 17;
        $Organization->name = 'Centro de Salud Universidad Arturo Prat';
        $Organization->alias = 'Centro de Salud Universidad Arturo Prat';
        $Organization->type = 8; //8 Centro de Salud
        $Organization->code_deis = 102227;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 4; //4 = Otra Institución
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Laboratorio Clínico Bionet S.A. - Iquique','alias'=>'Laboratorio Clínico Bionet S.A. - Iquique','type'=>'Laboratorio Clínico o Dental','old_code_deis' => '02-228','new_code_deis' => '102228','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 18;
        $Organization->name = 'Laboratorio Clínico Bionet S.A. - Iquique';
        $Organization->alias = 'Laboratorio Clínico Bionet S.A. - Iquique';
        $Organization->type = 10; //10 Laboratorio Clínico o Dental
        $Organization->code_deis = 102228;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Laboratorio Clínico Automatizado Elmo','alias'=>'Laboratorio Clínico Automatizado Elmo','type'=>'Laboratorio Clínico o Dental','old_code_deis' => '02-229','new_code_deis' => '102229','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 19;
        $Organization->name = 'Laboratorio Clínico Automatizado Elmo';
        $Organization->alias = 'Laboratorio Clínico Automatizado Elmo';
        $Organization->type = 10; //10 Laboratorio Clínico o Dental
        $Organization->code_deis = 102229;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Laboratorio Clínico Automatizado Biogénesis','alias'=>'Laboratorio Clínico Automatizado Biogénesis','type'=>'Laboratorio Clínico o Dental','old_code_deis' => '02-230','new_code_deis' => '102230','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 20;
        $Organization->name = 'Laboratorio Clínico Automatizado Biogénesis';
        $Organization->alias = 'Laboratorio Clínico Automatizado Biogénesis';
        $Organization->type = 10; //10 Laboratorio Clínico o Dental
        $Organization->code_deis = 102330;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Clinicum Laboratorio Automatizado Ltda.','alias'=>'Clinicum Laboratorio Automatizado Ltda.','type'=>'Laboratorio Clínico o Dental','old_code_deis' => '02-231','new_code_deis' => '102231','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 21;
        $Organization->name = 'Clinicum Laboratorio Automatizado Ltda.';
        $Organization->alias = 'Clinicum Laboratorio Automatizado Ltda.';
        $Organization->type = 10; //10 Laboratorio Clínico o Dental
        $Organization->code_deis = 102331;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro de Diálisis Medicen','alias'=>'Centro de Diálisis Medicen','type'=>'Centro de Diálisis','old_code_deis' => '02-232','new_code_deis' => '102232','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 22;
        $Organization->name = 'Centro de Diálisis Medicen';
        $Organization->alias = 'Centro de Diálisis Medicen';
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();
//}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
        //Organization::Create(['name'=>'Centro de Diálisis Iquique','alias'=>'Centro de Diálisis Iquique','type'=>'Centro de Diálisis','old_code_deis' => '02-233','new_code_deis' => '102233','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 23;
        $Organization->name = 'Centro de Diálisis Iquique';
        $Organization->alias = 'Centro de Diálisis Iquique';
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro de Diálisis Corporación Paúl Harris','alias'=>'Centro de Diálisis Corporación Paúl Harris','type'=>'Centro de Diálisis','old_code_deis' => '02-234','new_code_deis' => '102234','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 24;
        $Organization->name = 'Centro de Diálisis Corporación Paúl Harris';
        $Organization->alias = 'Centro de Diálisis Corporación Paúl Harris';
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Laboratorio Clínico Iquilab','alias'=>'Laboratorio Clínico Iquilab','type'=>'Laboratorio Clínico o Dental','old_code_deis' => '02-235','new_code_deis' => '102235','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 25;
        $Organization->name = 'Laboratorio Clínico Iquilab';
        $Organization->alias = 'Laboratorio Clínico Iquilab';
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Laboratorio Clínico Playa Brava','alias'=>'Laboratorio Clínico Playa Brava','type'=>'Laboratorio Clínico o Dental','old_code_deis' => '02-236','new_code_deis' => '102236','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 26;
        $Organization->name = 'Laboratorio Clínico Playa Brava';
        $Organization->alias = 'Laboratorio Clínico Playa Brava';
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();
        //Organization::Create(['name'=>'Laboratorio Clínico OASIS S.A.C.','alias'=>'Laboratorio Clínico OASIS S.A.C.','type'=>'Laboratorio Clínico o Dental','old_code_deis' => '02-238','new_code_deis' => '102238','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 27;
        $Organization->name = 'Laboratorio Clínico OASIS S.A.C.';
        $Organization->alias = 'Laboratorio Clínico OASIS S.A.C.';
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro de Diálisis la Tirana','alias'=>'Centro de Diálisis la Tirana','type'=>'Centro de Diálisis','old_code_deis' => '02-240','new_code_deis' => '102240','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 28;
        $Organization->name = 'Centro de Diálisis la Tirana';
        $Organization->alias = 'Centro de Diálisis la Tirana';
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Laboratorio Clínico Costanera','alias'=>'Laboratorio Clínico Costanera','type'=>'Laboratorio Clínico o Dental','old_code_deis' => '02-241','new_code_deis' => '102241','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 29;
        $Organization->name = 'Laboratorio Clínico Costanera';
        $Organization->alias = 'Laboratorio Clínico Costanera';
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Laboratorio Clínico Arauco Ltda.','alias'=>'Laboratorio Clínico Arauco Ltda.','type'=>'Laboratorio Clínico o Dental','old_code_deis' => '02-242','new_code_deis' => '102242','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 30;
        $Organization->name = 'Laboratorio Clínico Arauco Ltda.';
        $Organization->alias = 'Laboratorio Clínico Arauco Ltda.';
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();
        //Organization::Create(['name'=>'Centro de Salud Familiar Cirujano Aguirre','alias'=>'Centro de Salud Familiar Cirujano Aguirre','type'=>'Consultorio General Urbano (CGU)','old_code_deis' => '02-300','new_code_deis' => '102300','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 31;
        $Organization->name = 'Centro de Salud Familiar Cirujano Aguirre';
        $Organization->alias = 'CESFAM Cirujano Aguirre';
        $Organization->type = 11; //11 Consultorio General Urbano (CGU)
        $Organization->code_deis = 102300;
        $Organization->service = 3; // 3 Servicio de Salud Iquique
        $Organization->dependency = 6; //6 Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro de Salud Familiar Cirujano Videla','alias'=>'Centro de Salud Familiar Cirujano Videla','type'=>'Consultorio General Urbano (CGU)','old_code_deis' => '02-301','new_code_deis' => '102301','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 32;
        $Organization->name = 'Centro de Salud Familiar Cirujano Videla';
        $Organization->alias = 'CESFAM Cirujano Videla';
        $Organization->type = 11; //11 Consultorio General Urbano (CGU)
        $Organization->code_deis = 102301;
        $Organization->service = 3; // 3 Servicio de Salud Iquique
        $Organization->dependency = 6; //6 Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro de Salud Familiar Cirujano Guzmán','alias'=>'Centro de Salud Familiar Cirujano Guzmán','type'=>'Consultorio General Urbano (CGU)','old_code_deis' => '02-302','new_code_deis' => '102302','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 33;
        $Organization->name = 'Centro de Salud Familiar Cirujano Guzmán';
        $Organization->alias = 'CESFAM Guzmán';
        $Organization->type = 11; //11 Consultorio General Urbano (CGU)
        $Organization->code_deis = 102302;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 6; //6 = municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro de Salud Familiar Sur de Iquique','alias'=>'Centro de Salud Familiar Sur de Iquique','type'=>'Consultorio General Urbano (CGU)','old_code_deis' => '02-306','new_code_deis' => '102306','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 34;
        $Organization->name = 'Centro de Salud Familiar Sur de Iquique';
        $Organization->alias = 'CESFAM Sur Iquique';
        $Organization->type = 11; //11 Consultorio General Urbano (CGU)
        $Organization->code_deis = 102306;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 6; //6 = municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Posta de Salud Rural Chanavayita','alias'=>'Posta de Salud Rural Chanavayita','type'=>'Posta de Salud Rural (PSR)','old_code_deis' => '02-412','new_code_deis' => '102412','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 35;
        $Organization->name = 'Posta de Salud Rural Chanavayita';
        $Organization->alias = 'Posta Rural Chanavayita';
        $Organization->type = 13; //Posta de Salud Rural (PSR)
        $Organization->code_deis = 102412;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 6; //6 = municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Posta de Salud Rural San Marcos','alias'=>'Posta de Salud Rural San Marcos','type'=>'Posta de Salud Rural (PSR)','old_code_deis' => '02-413','new_code_deis' => '102413','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 36;
        $Organization->name = 'Posta de Salud Rural San Marcos';
        $Organization->alias = 'Posta Rural San Marcos';
        $Organization->type = 13; //Posta de Salud Rural (PSR)
        $Organization->code_deis = 102413;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 6; //6 = municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'COSAM Dr. Jorge Seguel Cáceres','alias'=>'COSAM Dr. Jorge Seguel Cáceres','type'=>'Centro Comunitario de Salud Mental  (COSAM)','old_code_deis' => '02-600','new_code_deis' => '102600','service'=>'Servicio de Salud Iquique','dependency'=>'Servicio de Salud','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 37;
        $Organization->name = 'COSAM Dr. Jorge Seguel Cáceres';
        $Organization->alias = 'COSAM Dr. Jorge Seguel Cáceres';
        $Organization->type = 14; //Centro Comunitario de Salud Mental  (COSAM)
        $Organization->code_deis = 102600;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'COSAM Salvador Allende','alias'=>'COSAM Salvador Allende','type'=>'Centro Comunitario de Salud Mental  (COSAM)','old_code_deis' => '02-601','new_code_deis' => '102601','service'=>'Servicio de Salud Iquique','dependency'=>'Servicio de Salud','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 38;
        $Organization->name = 'COSAM Salvador Allende';
        $Organization->alias = 'COSAM Salvador Allende';
        $Organization->type = 14; //Centro Comunitario de Salud Mental  (COSAM)
        $Organization->code_deis = 102601;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro Comunitario de Salud Familiar Cerro Esmeralda','alias'=>'Centro Comunitario de Salud Familiar Cerro Esmeralda','type'=>'Centro Comunitario de Salud Familiar (CECOSF)','old_code_deis' => '02-701','new_code_deis' => '102701','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 39;
        $Organization->name = 'Centro Comunitario de Salud Familiar Cerro Esmeralda';
        $Organization->alias = 'CECOSF Cerro Esmeralda';
        $Organization->type = 16; //Centro Comunitario de Salud Familiar (CECOSF)
        $Organization->code_deis = 102701;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 6; //6 = municipal        
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'SAPU Cirujano Aguirre','alias'=>'SAPU Cirujano Aguirre','type'=>'Servicio de Urgencia de APS','old_code_deis' => '02-800','new_code_deis' => '102800','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 40;
        $Organization->name = 'SAPU Cirujano Aguirre';
        $Organization->alias = 'SAPU Cirujano Aguirre';
        $Organization->type = 20; //Servicio de Urgencia de APS
        $Organization->code_deis = 102800;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 6; //6 = municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'SAPU Cirujano Videla','alias'=>'SAPU Cirujano Videla','type'=>'Servicio de Urgencia de APS','old_code_deis' => '02-801','new_code_deis' => '102801','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 41;
        $Organization->name = 'SAPU Cirujano Videla';
        $Organization->alias = 'SAPU Cirujano Videla';
        $Organization->type = 20; //Servicio de Urgencia de APS
        $Organization->code_deis = 102801;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 6; //6 = municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'SAPU Cirujano Guzmán','alias'=>'SAPU Cirujano Guzmán','type'=>'Servicio de Urgencia de APS','old_code_deis' => '02-802','new_code_deis' => '102802','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 42;
        $Organization->name = 'SAPU Cirujano Guzmán';
        $Organization->alias = 'SAPU Cirujano Guzmán';
        $Organization->type = 20; //Servicio de Urgencia de APS
        $Organization->code_deis = 102802;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 6; //6 = municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'SAR Sur de Iquique','alias'=>'SAR Sur de Iquique','type'=>'Servicio de Urgencia de APS','old_code_deis' => '02-806','new_code_deis' => '102806','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 43;
        $Organization->name = 'SAR Sur de Iquique';
        $Organization->alias = 'SAR Sur de Iquique';
        $Organization->type = 20; //Servicio de Urgencia de APS
        $Organization->code_deis = 102806;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 6; //6 = municipal        
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        ///////////////////////////////////////////////////////////////////////FIN REGIÓN DE TARAPACÁ//////////////////////////////////









        ////////////////////////REGIÓN DE ARICA Y PARINACOTA//////////////////////////////////////////////////
        $Organization = new Organization();
        $Organization->active = 44;
        $Organization->name = 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Arica)';
        $Organization->alias = 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Arica)';
        $Organization->type = 1; //Dirección Servicio de Salud
        $Organization->code_deis = 102806;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();


        $Organization = new Organization();
        $Organization->active = 45;
        $Organization->name = 'PRAIS (S.S Arica)';
        $Organization->alias = 'PRAIS (S.S Arica)';
        $Organization->type = 2; //Centro PRAIS
        $Organization->code_deis = 101011;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();

        $Organization = new Organization();
        $Organization->active = 46;
        $Organization->name = 'Clínica Dental Móvil Simple. Pat. PW4076 (Arica)';
        $Organization->alias = 'Clínica Dental Móvil Simple. Pat. PW4076 (Arica)';
        $Organization->type = 3; //Clínica Dental Movil
        $Organization->code_deis = 101012;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();


        $Organization = new Organization();
        $Organization->active = 47;
        $Organization->name = 'Oficina Sanitaria Chacalluta';
        $Organization->alias = 'Oficina Sanitaria Chacallutas';
        $Organization->type = 4; //Oficina Sanitaria
        $Organization->code_deis = 101090;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 2; //2 = Autoridad Sanitaria
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();


        $Organization = new Organization();
        $Organization->active = 48;
        $Organization->name = 'Hospital Regional Dr. Juan Noé Crevanni (Arica)';
        $Organization->alias = 'Hospital Regional Dr. Juan Noé Crevanni (Arica)';
        $Organization->type = 5; ///5=Hospital (Alta Complejidad)
        $Organization->code_deis = 101100;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();


        $Organization = new Organization();
        $Organization->active = 49;
        $Organization->name = 'Clínica Hebe';
        $Organization->alias = 'Clínica Hebe';
        $Organization->type = 6; ///6=Clínica
        $Organization->code_deis = 101203;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();

        $Organization = new Organization();
        $Organization->active = 50;
        $Organization->name = 'Clínica San Agustín';
        $Organization->alias = 'Clínica San Agustín';
        $Organization->type = 6; ///6=Clínica
        $Organization->code_deis = 101212;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();

        $Organization = new Organization();
        $Organization->active = 51;
        $Organization->name = 'Clínica San José';
        $Organization->alias = 'Clínica San José';
        $Organization->type = 6; ///6=Clínica
        $Organization->code_deis = 101213;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();


        $Organization = new Organization();
        $Organization->active = 52;
        $Organization->name = 'Complejo Penitenciario';
        $Organization->alias = 'Complejo Penitenciario';
        $Organization->type = 7; ///7=Hospital (No perteneciente al SNSS)
        $Organization->code_deis = 101215;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 4; //4 = Otra Institución
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();


        $Organization = new Organization();
        $Organization->active = 53;
        $Organization->name = 'Servicio Médico Estudiantil U. de Tarapacá';
        $Organization->alias = 'Servicio Médico Estudiantil U. de Tarapacá';
        $Organization->type = 8; ///8=Centro de Salud
        $Organization->code_deis = 101216;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 54;
        $Organization->name = 'Centro Clínico Militar Arica';
        $Organization->alias = 'Centro Clínico Militar Arica';
        $Organization->type = 8; ///8=Centro de Salud
        $Organization->code_deis = 101217;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 5; //5 = Público No perteneciente al SNSS
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 55;
        $Organization->name = 'Policlínico del Trabajador AChS Arica';
        $Organization->alias = 'Policlínico del Trabajador AChS Arica';
        $Organization->type = 8; ///8=Centro de Salud
        $Organization->code_deis = 101219;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 56;
        $Organization->name = 'Instituto Teletón Arica';
        $Organization->alias = 'Instituto Teletón Arica';
        $Organization->type = 8; ///8=Centro de Salud
        $Organization->code_deis = 101222;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 57;
        $Organization->name = 'Centro Médico Monte Sinaí';
        $Organization->alias = 'Centro Médico Monte Sinaí';
        $Organization->type = 8; ///8=Centro de Salud
        $Organization->code_deis = 101223;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();


        $Organization = new Organization();
        $Organization->active = 58;
        $Organization->name = 'Centro Integral de Salud';
        $Organization->alias = 'Centro Integral de Salud';
        $Organization->type = 8; ///8=Centro de Salud
        $Organization->code_deis = 101225;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 59;
        $Organization->name = 'Policlínico Institucional de Gendarmería de Chile';
        $Organization->alias = 'Policlínico Institucional de Gendarmería de Chile';
        $Organization->type = 8; ///8=Centro de Salud
        $Organization->code_deis = 101227;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 4; //4 = Otra Institución
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 60;
        $Organization->name = 'Policlínico del Agricultor';
        $Organization->alias = 'Policlínico del Agricultor';
        $Organization->type = 8; ///8=Centro de Salud
        $Organization->code_deis = 101228;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 61;
        $Organization->name = 'Centro Odontológico Arisa';
        $Organization->alias = 'Centro Odontológico Arisa';
        $Organization->type = 9; ///9=Clínica Dental
        $Organization->code_deis = 101229;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 62;
        $Organization->name = 'Centro de Salud Mutual CChC Arica';
        $Organization->alias = 'Centro de Salud Mutual CChC Aricas';
        $Organization->type = 8; ///8=Centro de Salud
        $Organization->code_deis = 101234;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 63;
        $Organization->name = 'Centro Dental Megasalud SpA';
        $Organization->alias = 'Centro Dental Megasalud SpA';
        $Organization->type = 9; ///9=Clínica Dental
        $Organization->code_deis = 101236;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 64;
        $Organization->name = 'Clínica Dr. Héctor Sánchez';
        $Organization->alias = 'Clínica Dr. Héctor Sánchez';
        $Organization->type = 6; ///6=Clínica
        $Organization->code_deis = 101237;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 65;
        $Organization->name = 'Policlínico Médico Dental de Carabineros';
        $Organization->alias = 'Policlínico Médico Dental de Carabineros';
        $Organization->type = 8; ///8=Centro de Salud
        $Organization->code_deis = 101239;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 5; //5 = Público No perteneciente al SNSS
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 66;
        $Organization->name = 'Laboratorio Clínico San José Ltda.';
        $Organization->alias = 'Laboratorio Clínico San José Ltda.';
        $Organization->type = 10; ///10=Laboratorio Clínico o Dental
        $Organization->code_deis = 101240;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 67;
        $Organization->name = 'Laboratorio Clínico Bionet S.A. - Arica';
        $Organization->alias = 'Laboratorio Clínico Bionet S.A. - Arica';
        $Organization->type = 10; ///10=Laboratorio Clínico o Dental
        $Organization->code_deis = 101241;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 68;
        $Organization->name = 'Laboratorio Clínico y Hematológico Diagnotest';
        $Organization->alias = 'Laboratorio Clínico y Hematológico Diagnotest';
        $Organization->type = 10; ///10=Laboratorio Clínico o Dental
        $Organization->code_deis = 101242;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 69;
        $Organization->name = 'Laboratorio Clínico Central';
        $Organization->alias = 'Laboratorio Clínico Central';
        $Organization->type = 10; ///10=Laboratorio Clínico o Dental
        $Organization->code_deis = 101243;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 70;
        $Organization->name = 'Laboratorio Clínico San Martín';
        $Organization->alias = 'Laboratorio Clínico San Martín';
        $Organization->type = 10; ///10=Laboratorio Clínico o Dental
        $Organization->code_deis = 101244;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 71;
        $Organization->name = 'Laboratorio Clínico Dialab';
        $Organization->alias = 'Laboratorio Clínico Dialab';
        $Organization->type = 10; ///10=Laboratorio Clínico o Dental
        $Organization->code_deis = 101245;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 72;
        $Organization->name = 'Laboratorio Clínico del Norte - Labonorte';
        $Organization->alias = 'Laboratorio Clínico del Norte - Labonorte';
        $Organization->type = 10; ///10=Laboratorio Clínico o Dental
        $Organization->code_deis = 101246;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 73;
        $Organization->name = 'Laboratorio Clínico Chungará';
        $Organization->alias = 'Laboratorio Clínico Chungará';
        $Organization->type = 10; ///10=Laboratorio Clínico o Dental
        $Organization->code_deis = 101247;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 74;
        $Organization->name = 'Laboratorio Clínico Biolascer';
        $Organization->alias = 'Laboratorio Clínico Biolascer';
        $Organization->type = 10; ///10=Laboratorio Clínico o Dental
        $Organization->code_deis = 101248;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 75;
        $Organization->name = 'Centro de Salud Familiar Víctor Bertín Soto';
        $Organization->alias = 'Centro de Salud Familiar Víctor Bertín Soto';
        $Organization->type = 11; ///11=Consultorio General Urbano (CGU)
        $Organization->code_deis = 101300;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 76;
        $Organization->name = 'Centro de Salud Familiar Dr. Amador Neghme de Arica';
        $Organization->alias = 'Centro de Salud Familiar Dr. Amador Neghme de Arica';
        $Organization->type = 11; ///11=Consultorio General Urbano (CGU)
        $Organization->code_deis = 101302;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 77;
        $Organization->name = 'Centro de Salud Familiar E. U. Iris Veliz Hume (Ex Oriente)';
        $Organization->alias = 'Centro de Salud Familiar E. U. Iris Veliz Hume (Ex Oriente)';
        $Organization->type = 11; ///11=Consultorio General Urbano (CGU)
        $Organization->code_deis = 101303;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 78;
        $Organization->name = 'Centro de Salud Familiar Putre';
        $Organization->alias = 'Centro de Salud Familiar Putre';
        $Organization->type = 12; ///12=Centro de Salud Familiar (CESFAM)
        $Organization->code_deis = 101304;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 79;
        $Organization->name = 'Centro de Salud Familiar Remigio Sapunar';
        $Organization->alias = 'Centro de Salud Familiar Remigio Sapunar';
        $Organization->type = 11; ///11=Consultorio General Urbano (CGU)
        $Organization->code_deis = 101305;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 80;
        $Organization->name = 'Centro de Salud Ambiental de Arica';
        $Organization->alias = 'Centro de Salud Ambiental de Arica';
        $Organization->type = 11; ///11=Consultorio General Urbano (CGU)
        $Organization->code_deis = 101306;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 81;
        $Organization->name = 'Centro de Salud Familiar Eugenio Petruccelli Astudillo (ex Punta Norte)';
        $Organization->alias = 'Centro de Salud Familiar Eugenio Petruccelli Astudillo (ex Punta Norte)';
        $Organization->type = 11; ///11=Consultorio General Urbano (CGU)
        $Organization->code_deis = 101307;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 82;
        $Organization->name = 'Posta de Salud Rural San Miguel de Azapa';
        $Organization->alias = 'Posta de Salud Rural San Miguel de Azapa';
        $Organization->type = 13; ///13=Posta de Salud Rural (PSR)
        $Organization->code_deis = 101400;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 83;
        $Organization->name = 'Posta de Salud Rural Poconchile';
        $Organization->alias = 'Posta de Salud Rural Poconchile';
        $Organization->type = 13; ///13=Posta de Salud Rural (PSR)
        $Organization->code_deis = 101401;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 84;
        $Organization->name = 'Posta de Salud Rural Belén (Putre)';
        $Organization->alias = 'Posta de Salud Rural Belén (Putre)';
        $Organization->type = 13; ///13=Posta de Salud Rural (PSR)
        $Organization->code_deis = 101402;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 85;
        $Organization->name = 'Posta de Salud Rural Visviri';
        $Organization->alias = 'Posta de Salud Rural Visviri';
        $Organization->type = 13; ///13=Posta de Salud Rural (PSR)
        $Organization->code_deis = 101404;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 86;
        $Organization->name = 'Posta de Salud Rural Codpa';
        $Organization->alias = 'Posta de Salud Rural Codpa';
        $Organization->type = 13; ///13=Posta de Salud Rural (PSR)
        $Organization->code_deis = 101406;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 87;
        $Organization->name = 'Posta de Salud Rural Ticnamar';
        $Organization->alias = 'Posta de Salud Rural Ticnamar';
        $Organization->type = 13; ///13=Posta de Salud Rural (PSR)
        $Organization->code_deis = 101407;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 88;
        $Organization->name = 'Posta de Salud Rural Sobraya';
        $Organization->alias = 'Posta de Salud Rural Sobraya';
        $Organization->type = 13; ///13=Posta de Salud Rural (PSR)
        $Organization->code_deis = 101408;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 89;
        $Organization->name = 'COSAM Norte';
        $Organization->alias = 'COSAM Norte';
        $Organization->type = 14; ///14=Centro Comunitario de Salud Mental (COSAM)
        $Organization->code_deis = 101607;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 90;
        $Organization->name = 'ESSMA Sur de Arica';
        $Organization->alias = 'ESSMA Sur de Arica';
        $Organization->type = 15; ///15=Pendiente de clasificar
        $Organization->code_deis = 101608;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 91;
        $Organization->name = 'Centro Comunitario de Salud Familiar Dr. Miguel Massa';
        $Organization->alias = 'Centro Comunitario de Salud Familiar Dr. Miguel Massa';
        $Organization->type = 16; ///16=Centro Comunitario de Salud Familiar (CECOSF)
        $Organization->code_deis = 101702;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 92;
        $Organization->name = 'Centro Comunitario de Salud Familiar Dr. René García Valenzuela';
        $Organization->alias = 'Centro Comunitario de Salud Familiar Dr. René García Valenzuela';
        $Organization->type = 16; ///16=Centro Comunitario de Salud Familiar (CECOSF)
        $Organization->code_deis = 101703;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 93;
        $Organization->name = 'Centro Comunitario de Salud Familiar Cerro La Cruz';
        $Organization->alias = 'Centro Comunitario de Salud Familiar Cerro La Cruz';
        $Organization->type = 16; ///16=Centro Comunitario de Salud Familiar (CECOSF)
        $Organization->code_deis = 101704;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();









        ////////////////////////FIN REGIÓN DE ARICA Y PARINACOTA///////////////////////////////////////////








    }
}
