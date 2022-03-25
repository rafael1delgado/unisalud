<?php

use App\Models\Samu\Event;
use App\Models\Samu\VitalSign;
use Illuminate\Database\Migrations\Migration;

class MigrateVitalSigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $events = Event::withTrashed()->get();

        foreach($events as $event)
        {
            if(
                $event->fc OR
                $event->fr OR
                $event->pa OR
                $event->pam OR
                $event->gl OR
                $event->soam OR
                $event->soap OR
                $event->hgt OR
                $event->fill_capillary OR
                $event->t
            )
            {
                $vitalSign = VitalSign::create([
                    'fc' => $event->fc,
                    'fr' => $event->fr,
                    'pa' => $event->pa,
                    'pam' => $event->pam,
                    'gl' => $event->gl,
                    'soam' => $event->soam,
                    'soap' => $event->soap,
                    'hgt' => $event->hgt,
                    'fill_capillary' => $event->fill_capillary,
                    't' => $event->t,
                    'registered_at'  => $event->created_at,
                    'created_at' => $event->created_at,
                    'updated_at' => $event->updated_at
                ]);
                $event->vitalSigns()->save($vitalSign);
            }


        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
