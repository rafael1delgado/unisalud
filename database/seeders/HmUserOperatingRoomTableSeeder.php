<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MedicalProgrammer\UserOperatingRoom;

class HmUserOperatingRoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserOperatingRoom::Create(['user_id' => 2,'operating_room_id'=>1]);
        UserOperatingRoom::Create(['user_id' => 2,'operating_room_id'=>2]);
        UserOperatingRoom::Create(['user_id' => 2,'operating_room_id'=>3]);
        UserOperatingRoom::Create(['user_id' => 2,'operating_room_id'=>4]);
        UserOperatingRoom::Create(['user_id' => 2,'operating_room_id'=>5]);
        UserOperatingRoom::Create(['user_id' => 2,'operating_room_id'=>6]);
        UserOperatingRoom::Create(['user_id' => 2,'operating_room_id'=>7]);
        UserOperatingRoom::Create(['user_id' => 2,'operating_room_id'=>8]);
    }
}
