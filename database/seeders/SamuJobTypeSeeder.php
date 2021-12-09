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
        JobType::create(['name' => 'Jefe de Turno', 'tripulant' => false]);
        JobType::create(['name' => 'Médico Regulador', 'tripulant' => false]);
        JobType::create(['name' => 'Enfermero Regulador', 'tripulant' => false]);
        JobType::create(['name' => 'Operador', 'tripulant' => false]);
        JobType::create(['name' => 'Despachador', 'tripulant' => false]);

        JobType::create(['name' => 'Conductor', 'tripulant' => true]);
        JobType::create(['name' => 'Paramédico', 'tripulant' => true]);
        JobType::create(['name' => 'Reanimador', 'tripulant' => true]);
        JobType::create(['name' => 'Médico', 'tripulant' => true]);
        JobType::create(['name' => 'Enfermero', 'tripulant' => true]);
    }
}
