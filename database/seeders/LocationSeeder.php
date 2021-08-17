<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::Create(['status' => 'inactive',
            'name' => 'Pasillo Verde',
            'alias' => 'Pasillo Verde',
            'description' => 'Pasillo Verde Hospital',
            'mode' => 'Instance', //The Location resource represents a specific instance of a location (e.g. Operating Theatre 1A).
            'organization_id' => 1,
        ]);

        Location::Create(['status' => 'active',
            'name' => 'Pasillo Rojo',
            'alias' => 'Pasillo Rojo',
            'description' => 'Pasillo Rojo Hospital',
            'mode' => 'Instance', //The Location resource represents a specific instance of a location (e.g. Operating Theatre 1A).
            'organization_id' => 1,
        ]);
    }
}
