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
    }
}
