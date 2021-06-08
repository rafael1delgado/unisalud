<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MedicalProgrammer\UserService;

class HmUserServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserService::Create(['service_id'=>1, 'user_id'=>2, 'principal' => 1]);
    }
}
