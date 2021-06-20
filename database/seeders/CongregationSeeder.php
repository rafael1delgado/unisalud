<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Congregation;

class CongregationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {/**"Código Glosa */

       /** 01 */ Congregation::Create(['id' => 1,'name'=>'Mapuche']);
       /** 02 */ Congregation::Create(['id' => 2,'name'=>'Aymara']);
       /** 03 */ Congregation::Create(['id' => 3,'name'=>'Rapa Nui (Pascuense)']);
       /** 04 */ Congregation::Create(['id' => 4,'name'=>'Lican Antai(Atacameño)']);
       /** 05 */ Congregation::Create(['id' => 5,'name'=>'Quechua']);
       /** 06 */ Congregation::Create(['id' => 6,'name'=>'Colla']);
       /** 07 */ Congregation::Create(['id' => 7,'name'=>'Diaguita']);
       /** 08 */ Congregation::Create(['id' => 8,'name'=>'Kawésqar']);
       /** 09 */ Congregation::Create(['id' => 9,'name'=>'Yagán (Yámana)']);
       /** 10 */ Congregation::Create(['id' => 10,'name'=>'Otro (Especificar)']);
   
    }
}
