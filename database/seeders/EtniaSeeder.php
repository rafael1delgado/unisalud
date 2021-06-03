<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Etnia;

class EtniaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {/**"Código Glosa */

       /** 01 */ Etnia::Create(['id' => 1,'name'=>'Mapuche']);
       /** 02 */ Etnia::Create(['id' => 2,'name'=>'Aymara']);
       /** 03 */ Etnia::Create(['id' => 3,'name'=>'Rapa Nui (Pascuense)']);
       /** 04 */ Etnia::Create(['id' => 4,'name'=>'Lican Antai(Atacameño)']);
       /** 05 */ Etnia::Create(['id' => 5,'name'=>'Quechua']);
       /** 06 */ Etnia::Create(['id' => 6,'name'=>'Colla']);
       /** 07 */ Etnia::Create(['id' => 7,'name'=>'Diaguita']);
       /** 08 */ Etnia::Create(['id' => 8,'name'=>'Kawésqar']);
       /** 09 */ Etnia::Create(['id' => 9,'name'=>'Yagán (Yámana)']);
       /** 10 */ Etnia::Create(['id' => 10,'name'=>'Otro (Especificar)']);
       /** 96 */ Etnia::Create(['id' => 96,'name'=>'Ninguno']);
   
    }
}
