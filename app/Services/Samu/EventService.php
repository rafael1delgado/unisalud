<?php

namespace App\Services\Samu;

use App\Models\Samu\Call;
use App\Models\Samu\Event;
use App\Models\Samu\VitalSign;

class EventService
{
    /**
     * Method to create an Event
     * 
     * @param  \App\Models\Samu\Event  $event
     * @param  \App\Models\Samu\Call  $call
     * @param  array  $dataValidated
     * 
     * @return void
     */
    public function create(Event $event = null, Call $call = null, $dataValidated)
    {
        $callRelationed = $event ? $event->call : $call;
        $newEvent = Event::create($dataValidated);
        $newEvent->call()->associate($callRelationed);
        $newEvent->save();

        $vitalSigns = json_decode($dataValidated['vital_signs'], TRUE);

        foreach($vitalSigns as $itemVitalSign)
        {
            $vitalSign = VitalSign::create($itemVitalSign);
            $newEvent->vitalSigns()->save($vitalSign);
            $newEvent->save();
        }
    }

    /**
     * Method to update an Event
     * 
     * @param  \App\Models\Samu\Event  $event
     * @param  array  $dataValidated
     * 
     * @return void
     */
    public function update(Event $event, $dataValidated)
    {
        $dataValidated['status'] = ($dataValidated["save_close"] == "yes") ? false : $event->status;
        $event->update($dataValidated);

        $vitalSigns = json_decode($dataValidated['vital_signs'], TRUE);

        $isMobileInService = $event->shift->MobilesInService->where('mobile_id', $dataValidated['mobile_id'])->first();

        if($isMobileInService)
        {
            $event->mobileInService()->associate($isMobileInService);
        }
        else 
        {
            $event->mobileInService()->dissociate();
        }
    }
}
