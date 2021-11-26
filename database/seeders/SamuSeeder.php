<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Samu\Shift;
use App\Models\Samu\Mobile;
use App\Models\Samu\MobileInService;
use App\Models\Samu\Call;
use App\Models\Samu\Ot;
use App\Models\Samu\Qtc;

class SamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        auth()->loginUsingId(1);

        Shift::create([
            'status' => true,
            'type'   => 'Largo',
            'opening_at' => now(),
            'status' => true
        ]);

        Shift::create([
            'status' => true,
            'type'   => 'Noche',
            'opening_at' =>25-11-2021,
            'status' => false
        ]);

        Shift::create([
            'status' => true,
            'type'   => 'Largo',
            'opening_at' => 24-11-2021,
            'status' => false
        ]);
        Shift::create([
            'status' => true,
            'type'   => 'Noche',
            'opening_at' => 24-11-2021,
            'status' => false
        ]);

        Mobile::create([
            'code'      => '31',
            'name'      => 'POZO AL MONTE',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '32',
            'name'      => 'POZO AL MONTE',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '33',
            'name'      => 'POZO AL MONTE',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '34',
            'name'      => 'POZO AL MONTE',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '41',
            'name'      => 'PICA',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '51',
            'name'      => 'HUARA',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '52',
            'name'      => 'HUARA',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '61',
            'name'      => 'CAMIÑA',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '71',
            'name'      => 'COLCHANE',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '12CH',
            'name'      => 'CHANAVAYITA',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '11SM',
            'name'      => 'SAN MARCO',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '25',
            'name'      => 'SAPU VIDELA',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '26',
            'name'      => 'SAPU AGUIRRE',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '27',
            'name'      => 'SAPU GUZMAN',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'No operativo',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '28',
            'name'      => 'SAR SUR',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '2H',
            'name'      => 'CGU',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '21',
            'name'      => 'SAPU PULGAR',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '22',
            'name'      => 'SAPU PULGAR',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '23',
            'name'      => 'SAPU PULGAR',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '2',
            'name'      => 'SAMU',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '3',
            'name'      => 'SAMU',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '4',
            'name'      => 'SAMU',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '4H',
            'name'      => 'SAMU',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '7',
            'name'      => 'SAMU',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
            'description' => 'Descripcion',
            'status'    => 1,
            'managed'   => 1
        ]);
        Mobile::create([
            'code'      => '13',
            'name'      => 'SAMU',
            'plate'     => '000',
            'type'      => 'AMBULANCIA',
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

        $call1 = Call::create([
            'shift_id' => 1,
            'classification' => "OT",
            'receptor_id' => 1,
            'hour' => "08:00:00",
            'receptor_id' => 1,
            'information' => "Informacion dada por telefono",
            'applicant' => "Alexsandra Daddario",
            'address' => "Calle numero",
            'telephone' => "696969"
        ]);

        $call2 = Call::create([
            'shift_id' => 1,
            'classification' => "T1",
            'receptor_id' => 1,
            'hour' => "08:15:00",
            'receptor_id' => 1,
            'information' => "Informacion dada por telefono",
            'applicant' => "Ewan McGregor",
            'address' => "Avenida Prat",
            'telephone' => "123123"
        ]);

        Ot::create([
            'call_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, voluptatum! Eaque facilis ex unde maiores quo atque, cum consequuntur vel provident maxime est. Similique hic aspernatur maiores incidunt ab officiis.',
        ]);

        $qtc = Qtc::create([
            'shift_id' => 1,
            'key_id' => 1,
            'return_key_id' => 2,
        ]);

        $call2->qtcs()->attach($qtc);

    }
}
