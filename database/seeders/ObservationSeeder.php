<?php

namespace Database\Seeders;

use App\Models\Observation;
use Illuminate\Database\Seeder;

class ObservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {Observation::Create(['status' => 'registered',
        'description' => 'No ingerir cualquier tipo de alcohol en las proximas 24 horas',
    ]);
    }
}
