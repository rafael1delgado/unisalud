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
        CodConObservationCategory::Create([
            'id' => 1,
            'text' => 'social-history'
        ]);

        CodConObservationCategory::Create([
            'id' => 2,
            'text' => 'vita-signs'
        ]);
        CodConObservationCategory::Create([
            'id' => 3,
            'text' => 'imaging'
        ]);
        CodConObservationCategory::Create([
            'id' => 4,
            'text' => 'laboratory'
        ]);
        CodConObservationCategory::Create([
            'id' => 5,
            'text' => 'procedure'
        ]);
        CodConObservationCategory::Create([
            'id' => 6,
            'text' => 'survey'
        ]);
        CodConObservationCategory::Create([
            'id' => 7,
            'text' => 'exam'
        ]);
        CodConObservationCategory::Create([
            'id' => 8,
            'text' => 'therapy'
        ]);
        CodConObservationCategory::Create([
            'id' => 9,
            'text' => 'activity'
        ]);
    
    }
}
