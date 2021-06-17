<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MedicalProgrammer\Profession;

class HmProfessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Profession::Create(['id_profession'=>2, 'profession_name'=>'ENFERMERA','color'=>'1D19FF']);
      Profession::Create(['id_profession'=>3, 'profession_name'=>'MATRONA','color'=>'FF0F1B']);
      Profession::Create(['id_profession'=>4, 'profession_name'=>'NUTRICIONISTA','color'=>'C68AFF']);
      Profession::Create(['id_profession'=>5, 'profession_name'=>'KINESIOLOGO','color'=>'292429']);
      Profession::Create(['id_profession'=>6, 'profession_name'=>'FONOAUDIOLOGO','color'=>'52FF66']);
      Profession::Create(['id_profession'=>7, 'profession_name'=>'PSICOLOGO','color'=>'FCFF38']);
      Profession::Create(['id_profession'=>8, 'profession_name'=>'TERAPEUTA_OCUPACIONAL','color'=>'8CFF9A']);
      Profession::Create(['id_profession'=>9, 'profession_name'=>'ASISTENTE_SOCIAL','color'=>'8E8E94']);
      Profession::Create(['id_profession'=>10, 'profession_name'=>'TECNOLOGO_MEDICO','color'=>'B326FF']);
      Profession::Create(['id_profession'=>11, 'profession_name'=>'QUIMICO_FARMACEUTICO','color'=>'FF5714']);
      Profession::Create(['id_profession'=>12, 'profession_name'=>'BIOQUIMICO','color'=>'EDFFFF']);
    }
}
