<?php

namespace Database\Seeders;

use App\Models\Sex;
use Illuminate\Database\Seeder;

class SexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sex::create(['value' => 'male', 'text' => 'Masculino']);
        Sex::create(['value' => 'female', 'text' => 'Femenino']);
        Sex::create(['value' => 'unknown', 'text' => 'Desconocido']);
        Sex::create(['value' => 'other', 'text' => 'Otro']);
    }
}
