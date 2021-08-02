<?php

namespace Database\Seeders;

use App\Models\CodConObservationCategory;
use Illuminate\Database\Seeder;

class CodConObservationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CodConObservationCategory::Create(['text' => 'social-history']);
        CodConObservationCategory::Create(['text' => 'vita-signs']);
        CodConObservationCategory::Create(['text' => 'imaging']);
        CodConObservationCategory::Create(['text' => 'laboratory']);
        CodConObservationCategory::Create(['text' => 'procedure']);
        CodConObservationCategory::Create(['text' => 'survey']);
        CodConObservationCategory::Create(['text' => 'exam']);
        CodConObservationCategory::Create(['text' => 'therapy']);
        CodConObservationCategory::Create(['text' => 'activity']);
    }
}
