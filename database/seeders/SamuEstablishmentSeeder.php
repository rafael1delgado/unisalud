<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Samu\Establishment;

class SamuEstablishmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Establishment::create(['organization_id' => 4]);
        Establishment::create(['organization_id' => 5]);
        Establishment::create(['organization_id' => 6]);
        Establishment::create(['organization_id' => 40]);
        Establishment::create(['organization_id' => 41]);
        Establishment::create(['organization_id' => 42]);
        Establishment::create(['organization_id' => 43]);
        Establishment::create(['organization_id' => 35]);
        Establishment::create(['organization_id' => 36]);
        Establishment::create(['organization_id' => 46]);
        Establishment::create(['organization_id' => 47]);
        Establishment::create(['organization_id' => 48]);
        Establishment::create(['organization_id' => 49]);
        Establishment::create(['organization_id' => 50]);
        Establishment::create(['organization_id' => 51]);
        Establishment::create(['organization_id' => 52]);
        Establishment::create(['organization_id' => 74]);
        Establishment::create(['organization_id' => 124]);
    }
}
