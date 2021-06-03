<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PuebloIndigenas;

class PuebloIndigenasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PuebloIndigenas::Create(['name'=>'Aymara']);
        PuebloIndigenas::Create(['name'=>'Quechua']);
        PuebloIndigenas::Create(['name'=>'Atacameño']);
        PuebloIndigenas::Create(['name'=>'Kolla']);
        PuebloIndigenas::Create(['name'=>'Diaguita']);
        PuebloIndigenas::Create(['name'=>'Rapanui']);
        PuebloIndigenas::Create(['name'=>'Mapuche']);
        PuebloIndigenas::Create(['name'=>'Yagán']);
        PuebloIndigenas::Create(['name'=>'Kawésqar']);
    }
}
