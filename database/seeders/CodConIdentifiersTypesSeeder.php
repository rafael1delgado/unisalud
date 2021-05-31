<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CodConIdentifiersTypes;

class CodConIdentifiersTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* id = 1 */ CodConIdentifiersTypes::Create(['text'=>'DNI']);
        /* id = 2 */ CodConIdentifiersTypes::Create(['text'=>'Pasaporte']);
        /* id = 3 */ CodConIdentifiersTypes::Create(['text'=>'CI']);
        /* id = 4 */ CodConIdentifiersTypes::Create(['text'=>'Acta de Nacimiento']);
        /* id = 5 */ CodConIdentifiersTypes::Create(['text'=>'Numero de ficha']);
        /* id = 6 */ CodConIdentifiersTypes::Create(['text'=>'Licencia de Conducir']);
    }
}
