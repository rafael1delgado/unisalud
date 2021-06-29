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
            'user_id' => 343,
            'organization_id' => 1,
            'specialty_id' => 51
            ]);
    }
}
