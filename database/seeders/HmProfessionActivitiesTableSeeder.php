<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MedicalProgrammer\ProfessionActivity;

class HmProfessionActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfessionActivity::Create(['profession_id'=>1,'activity_id'=>141, 'performance'=>3]);
        ProfessionActivity::Create(['profession_id'=>1,'activity_id'=>143, 'performance'=>3]);
        ProfessionActivity::Create(['profession_id'=>1,'activity_id'=>67]);
        ProfessionActivity::Create(['profession_id'=>1,'activity_id'=>114]);
        ProfessionActivity::Create(['profession_id'=>1,'activity_id'=>76, 'performance'=>2]);
        ProfessionActivity::Create(['profession_id'=>1,'activity_id'=>70]);
    }
}
