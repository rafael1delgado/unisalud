<?php

namespace Database\Seeders;

use App\Models\Practitioner;
use Illuminate\Database\Seeder;
use App\Models\Region;

class PractitionerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Practitioner::Create(['active' => 1,
            'user_id' => 3,
            ]);
    }
}
