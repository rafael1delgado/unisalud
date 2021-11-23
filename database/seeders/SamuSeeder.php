<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Samu\Shift;
use App\Models\Samu\Mobile;
use App\Models\Samu\MobileInService;
use App\Models\Samu\Call;

class SamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shift::create([
            'status' => true,
            'type'   => 'Largo',
            'opening_at' => now(),
            'status' => true
        ]);

        Mobile::create([
            'code'      => '123',
            'name'      => 'Amb 1',
            'plate'     => 'ZXC69',
            'type'      => 'Grande',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);

        MobileInService::create([
            'shift_id' => 1,
            'mobile_id' => 1,
            'type' => "M1",
            'observation' => "asdfa",
            'status' => 1
        ]);

        Call::create([
            'shift_id' => 1,
            'class_call' => "T1",
            'qtc_id' => null,
            'ot_id' => null,
            'hour' => "08:00:00",
            'call_reception' => "Operador 1",
            'telephone_information' => "982598059",
            'applicant' => "aertsdf",
            'address' => "Calle numero",
            'telephone' => "982598059",
        ]);
    }
}
