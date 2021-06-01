<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CodConIdentifierType;

class CodConIdentifiersTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* id = 1 */ CodConIdentifierType::Create(['text'=>'DNI']);
        /* id = 2 */ CodConIdentifierType::Create(['text'=>'Pasaporte']);
        /* id = 3 */ CodConIdentifierType::Create(['text'=>'CI']);
        /* id = 4 */ CodConIdentifierType::Create(['text'=>'Acta de Nacimiento']);
        /* id = 5 */ CodConIdentifierType::Create(['text'=>'Numero de ficha']);
        /* id = 6 */ CodConIdentifierType::Create(['text'=>'Licencia de Conducir']);
    }
}
