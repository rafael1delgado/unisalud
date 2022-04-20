<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::create(['value' => 'male', 'text' => 'Masculino']);
        Gender::create(['value' => 'female', 'text' => 'Femenino']);
        Gender::create(['value' => 'transgender-female', 'text' => 'Femenino Trans "FT"']);
        Gender::create(['value' => 'transgender-male', 'text' => 'Masculino Trans "MT"']);
        Gender::create(['value' => 'other', 'text' => 'Otro']);
    }
}
