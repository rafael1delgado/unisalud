<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MedicalProgrammer\OperatingRoomSpecialty;

class HmOperatingRoomSpecialties extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      OperatingRoomSpecialty::Create(['operating_room_id' => 9,'specialty_id' => 51]);
      OperatingRoomSpecialty::Create(['operating_room_id' => 9,'specialty_id' => 50]);
      OperatingRoomSpecialty::Create(['operating_room_id' => 10,'specialty_id' => 51]);
      OperatingRoomSpecialty::Create(['operating_room_id' => 10,'specialty_id' => 50]);
      OperatingRoomSpecialty::Create(['operating_room_id' => 11,'specialty_id' => 51]);
      OperatingRoomSpecialty::Create(['operating_room_id' => 11,'specialty_id' => 50]);
      OperatingRoomSpecialty::Create(['operating_room_id' => 12,'specialty_id' => 51]);
      OperatingRoomSpecialty::Create(['operating_room_id' => 12,'specialty_id' => 50]);

    }
}
