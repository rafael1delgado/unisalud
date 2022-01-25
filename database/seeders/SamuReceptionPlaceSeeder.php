<?php

namespace Database\Seeders;

use App\Models\Samu\ReceptionPlace;
use Illuminate\Database\Seeder;

class SamuReceptionPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReceptionPlace::create(['name' => 'Domicilio Particular']);
        ReceptionPlace::create(['name' => 'Domicilio de Familiar']);
        ReceptionPlace::create(['name' => 'Residencia Sanitaria']);
        ReceptionPlace::create(['name' => 'Otro lugar']);
    }
}
