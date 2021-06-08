<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MedicalProgrammer\Contract;

class HmContractsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contract::Create(['user_id'=>3,'law'=>'LEY 19.664','contract_id'=>751677,'weekly_hours'=>22,'shift_system'=>'N','obs'=>NULL,'legal_holidays'=>20,'compensatory_rest'=>NULL,'administrative_permit'=>12,'training_days'=>10,'breastfeeding_time'=>NULL,'weekly_collation'=>180,'contract_start_date'=>'2021-01-01','contract_end_date'=>'2021-12-31','unit'=>'CR. MEDICINA','unit_code'=>NULL,'service_id'=>1,'year'=>2021]);
        Contract::Create(['user_id'=>4,'law'=>'LEY 19.664','contract_id'=>352661,'weekly_hours'=>33,'shift_system'=>'N','obs'=>NULL,'legal_holidays'=>20,'compensatory_rest'=>NULL,'administrative_permit'=>12,'training_days'=>10,'breastfeeding_time'=>NULL,'weekly_collation'=>180,'contract_start_date'=>'2021-01-01','contract_end_date'=>'2021-12-31','unit'=>'CR. MEDICINA','unit_code'=>NULL,'service_id'=>2,'year'=>2021]);
    }
}
