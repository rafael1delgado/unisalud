<?php

namespace App\Observers\Samu;

use App\Models\Commune;
use App\Models\Samu\Call;
use App\Models\Samu\Shift;

class CallObserver
{
    /**
     * Handle the Call "creating" event.
     *
     * @param  \App\Models\Call  $call
     * @return void
     */
    public function creating(Call $call)
    {
        if($call->commune)
        {
            if ($call->commune->latitude == $call->latitude && $call->commune->longitude == $call->longitude)
            {
                $call->latitude = null;
                $call->longitude = null;
            }
        }

        $call->receptor()->associate(auth()->user());
        $call->shift()->associate(Shift::whereStatus(true)->first());
        $call->hour = now();
    }

    /**
     * Handle the Call "updating" event.
     *
     * @param  \App\Models\Call  $call
     * @return void
     */
    public function updating(Call $call)
    {
        if($call->commune)
        {
            if ($call->commune->latitude == $call->latitude && $call->commune->longitude == $call->longitude)
            {
                $call->latitude = null;
                $call->longitude = null;
            }
        }
    }

}
