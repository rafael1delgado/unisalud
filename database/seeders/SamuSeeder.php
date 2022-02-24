<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Samu\Shift;
use App\Models\Samu\Mobile;
use App\Models\Samu\MobileInService;
use App\Models\Samu\Call;
use App\Models\Samu\Ot;
use App\Models\Samu\Event;
use App\Models\Samu\EventCounter;

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
        $date = now();

        Shift::create([
            'status' => true,
            'type'   => 'Noche',
            'opening_at' => date('Y-m-d 8:00:00',(strtotime ( '-3 day' , strtotime ( $date) ) )),
            'status' => false,
            'created_at' => date('Y-m-d 8:00:00',(strtotime ( '-3 day' , strtotime ( $date) ) )),
            'updated_at' => date('Y-m-d 8:00:00',(strtotime ( '-3 day' , strtotime ( $date) ) ))
        ]);
        
        Shift::create([
            'status' => true,
            'type'   => 'Largo',
            'opening_at' => date('Y-m-d 8:00:00',(strtotime ( '-2 day' , strtotime ( $date) ) )),
            'status' => false,
            'created_at' => date('Y-m-d 8:00:00',(strtotime ( '-2 day' , strtotime ( $date) ) )),
            'updated_at' => date('Y-m-d 8:00:00',(strtotime ( '-2 day' , strtotime ( $date) ) ))
        ]);

        Shift::create([
            'status' => true,
            'type'   => 'Noche',
            'opening_at' => date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $date) ) )),
            'status' => false,
            'created_at' => date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $date) ) )),
            'updated_at' => date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $date) ) ))
        ]);

        Shift::create([
            'status' => true,
            'type'   => 'Largo',
            'opening_at' => date('Y-m-d 8:00:00'),
            'status' => true,
            'created_at' => date('Y-m-d 8:00:00'),
            'updated_at' => date('Y-m-d 8:00:00')
        ]);

        MobileInService::create([
            'shift_id' => 4,
            'mobile_id' => 20,
            'type' => "M1",
            'observation' => "observación",
            'status' => 1
        ]);

        $call1 = Call::create([
            'shift_id' => 4,
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
            'shift_id' => 4,
            'classification' => "T1",
            'receptor_id' => 1,
            'hour' => "08:15:00",
            'receptor_id' => 1,
            'information' => "Informacion dada por telefono",
            'applicant' => "Ewan McGregor",
            'address' => "Avenida Prat",
            'telephone' => "123123"
        ]);


        // EventCounter::create([
        //     'date' => now(),
        //     'counter' => 1,
        // ]);

        $event = Event::create([
            // 'date' => now(),
            // 'counter' => 1,
            'shift_id' => 4,
            'key_id' => 1,
            'return_key_id' => 2,
        ]);

        $call2->events()->attach($event);

    }
}
