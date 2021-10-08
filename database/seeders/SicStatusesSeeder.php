<?php

namespace Database\Seeders;

use App\Models\Some\SicStatus;
use Illuminate\Database\Seeder;

class SicStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SicStatus::Create(['id' => 1, 'name' => 'Pendientes']);
        SicStatus::Create(['id' => 2, 'name' => 'Priorizadas']);
        SicStatus::Create(['id' => 3, 'name' => 'Citadas']);
        SicStatus::Create(['id' => 4, 'name' => 'Observadas']);
        SicStatus::Create(['id' => 5, 'name' => 'Rechazadas']);
    }
}
