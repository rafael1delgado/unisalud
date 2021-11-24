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
        $Organization = new Organization();
        $Organization->active = 1;
        $Organization->name = 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Iquique)';
        $Organization->alias = 'Servicio de Salud Iquique';
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
        $Organization->alias = 'Clínica Dental Móvil Simple. Pat. RW6740 (Iquique)';
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
        $Organization->service = 'Servicio de Salud Iquique';
        $Organization->dependency = 'Municipal';
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
        $Organization->service = 'Servicio de Salud Iquique';
        $Organization->dependency = 'Municipal';
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
        $Organization->service = 'Servicio de Salud Iquique';
        $Organization->dependency = 'Municipal';        
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
        $Organization->alias = 'Centro de Salud Familiar Sur de Iquique';
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
        $Organization->alias = 'Posta de Salud Rural Chanavayita';
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
        $Organization->alias = 'Posta de Salud Rural San Marcos';
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
        $Organization->alias = 'Centro Comunitario de Salud Familiar Cerro Esmeralda';
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
    }
}
