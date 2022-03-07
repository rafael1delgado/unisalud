<?php

namespace App\Observers\Samu;

use App\Models\Commune;
use App\Models\Samu\Call;

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
        $selectedCommune = Commune::find($call->commune_id);
        
        if($selectedCommune)
        {
            if ($selectedCommune->latitude == $call->latitude && $selectedCommune->longitude == $call->longitude)
            {
                $call->latitude = null;
                $call->longitude = null;
            }
        }

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
        $selectedCommune = Commune::find($call->commune_id);
        
        if($selectedCommune)
        {
            if ($selectedCommune->latitude == $call->latitude && $selectedCommune->longitude == $call->longitude)
            {
                $call->latitude = null;
                $call->longitude = null;
            }
        }
    }

}
