<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExtMedicine;

class ExtMedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** 01 */ ExtMedicine::Create(['id' => 1,'name'=>'Ácido ursodesoxicólico']);
        /** 02 */ ExtMedicine::Create(['id' => 2,'name'=>'Aerocámara']);
        /** 03 */ ExtMedicine::Create(['id' => 3,'name'=>'Alimento enteral básico libre de lactosa y gluten']);
        /** 04 */ ExtMedicine::Create(['id' => 4,'name'=>'Alimento enteral básico libre de lactosa y gluten sin sacarosa']);
        /** 05 */ ExtMedicine::Create(['id' => 5,'name'=>'Amikacina']);
        /** 06 */ ExtMedicine::Create(['id' => 6,'name'=>'Amoxicilina-ácido clavulánico comp.']);
        /** 07 */ ExtMedicine::Create(['id' => 7,'name'=>'Amoxicilina-ácido clavulánico jarabe']);
        /** 08 */ ExtMedicine::Create(['id' => 8,'name'=>'Azitromicina']);
        /** 09 */ ExtMedicine::Create(['id' => 9,'name'=>'Bifosfonatos']);
        /** 10 */ ExtMedicine::Create(['id' => 10,'name'=>'Calcio']);
        /** 11 */ ExtMedicine::Create(['id' => 11,'name'=>'Ceftazidima']);
        /** 12 */ ExtMedicine::Create(['id' => 12,'name'=>'Ciprofloxacino']);
        /** 13 */ ExtMedicine::Create(['id' => 13,'name'=>'Clindamicina']);
        /** 14 */ ExtMedicine::Create(['id' => 14,'name'=>'Cloxacilina']);
        /** 15 */ ExtMedicine::Create(['id' => 15,'name'=>'Enzimas pancreáticas']);
        /** 16 */ ExtMedicine::Create(['id' => 16,'name'=>'Flucloxacilina']);
        /** 17 */ ExtMedicine::Create(['id' => 17,'name'=>'Fluticasona']);
        /** 18 */ ExtMedicine::Create(['id' => 18,'name'=>'Fluticasona/salmeterol']);
        /** 19 */ ExtMedicine::Create(['id' => 19,'name'=>'Gentamicina']);
        /** 20 */ ExtMedicine::Create(['id' => 20,'name'=>'Imipenem']);
        /** 21 */ ExtMedicine::Create(['id' => 21,'name'=>'Itraconazol']);
        /** 22 */ ExtMedicine::Create(['id' => 22,'name'=>'Linezolida']);
        /** 23 */ ExtMedicine::Create(['id' => 23,'name'=>'Maltosa dextrina alimento enteral']);
        /** 24 */ ExtMedicine::Create(['id' => 24,'name'=>'Nebulización rh-dornasa-alfa']);
        /** 25 */ ExtMedicine::Create(['id' => 25,'name'=>'Prednisona comprimido']);
        /** 26 */ ExtMedicine::Create(['id' => 26,'name'=>'Prednisona en jarabe']);
        /** 27 */ ExtMedicine::Create(['id' => 27,'name'=>'Ranitidina']);
        /** 28 */ ExtMedicine::Create(['id' => 28,'name'=>'Salbutamol']);
        /** 29 */ ExtMedicine::Create(['id' => 29,'name'=>'Suplemento nutricional oral, con fructoligosacáridos y osmolaridad moderada']);
        /** 30 */ ExtMedicine::Create(['id' => 30,'name'=>'Tobramicina']);
        /** 31 */ ExtMedicine::Create(['id' => 31,'name'=>'Vancomicina']);
        /** 32 */ ExtMedicine::Create(['id' => 32,'name'=>'Vitaminas liposolubles aqua A.D.E.K.']);
    }
}
