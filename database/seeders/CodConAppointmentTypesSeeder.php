<?php

namespace Database\Seeders;

use App\Models\CodConAppointmentType;
use Illuminate\Database\Seeder;

class CodConAppointmentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CodConAppointmentType::Create(['text' => 'CHECKUP',
        ]);
        CodConAppointmentType::Create(['text' => 'EMERGENCY',
        ]);
        CodConAppointmentType::Create(['text' => 'FOLLOWUP',
        ]);
        CodConAppointmentType::Create(['text' => 'ROUTINE',
        ]);
        CodConAppointmentType::Create(['text' => 'WALKIN',
        ]);
        CodConAppointmentType::Create(['text' => 'OVERBOOKING',
        ]);
    }
}
