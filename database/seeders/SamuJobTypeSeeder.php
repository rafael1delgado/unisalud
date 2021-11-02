<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Samu\JobType;

class SamuJobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobType::create(['name' => 'Jefe de Turno']);
        JobType::create(['name' => 'Médico Regulador']);
        JobType::create(['name' => 'Enfermero Regulador']);
        JobType::create(['name' => 'Operador']);
        JobType::create(['name' => 'Despachador']);

        JobType::create(['name' => 'Conductor']);
        JobType::create(['name' => 'Paramédico']);
        JobType::create(['name' => 'Reanimador']);
        JobType::create(['name' => 'Médico']);
        JobType::create(['name' => 'Enfermero']);
    }
}
