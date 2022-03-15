<?php

namespace App\Observers;

use App\Models\Samu\MobileInService;
use App\Models\Samu\Shift;

class MobileInServiceObserver
{
    /**
     * Handle the MobileInService "deleted" event.
     *
     * @param  \App\Models\Samu\MobileInService  $mobileInService
     * @return void
     */
    public function deleted(MobileInService $mobileInService)
    {
        $shift = Shift::whereStatus(true)->first();

        $mobileInService->update([
            'position' => 0,
        ]);

        MobileInService::reorder($shift);
    }
}
