<?php

namespace Database\Seeders;

use App\Models\CodConMarital;
use Illuminate\Database\Seeder;

class CodConMaritalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CodConMarital::Create([
            'id' => 1,
            'text' => 'SOLTERO(A)'
        ]);

        CodConMarital::Create([
            'id' => 2,
            'text' => 'CASADO(A)'
        ]);
        CodConMarital::Create([
            'id' => 3,
            'text' => 'VIUDO(A)'
        ]);
        CodConMarital::Create([
            'id' => 4,
            'text' => 'DIVORCIADO(A)'
        ]);
        CodConMarital::Create([
            'id' => 5,
            'text' => 'SEPARADO(A)'
        ]);
        CodConMarital::Create([
            'id' => 6,
            'text' => 'CONVIVIENTE'
        ]);
        CodConMarital::Create([
            'id' => 99,
            'text' => 'DESCONOCIDO'
        ]);
    }
}
