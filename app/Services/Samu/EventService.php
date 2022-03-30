<?php

namespace App\Services\Samu;

use App\Models\Samu\Call;
use App\Models\Samu\Event;
use App\Models\Samu\VitalSign;

class EventService
{
    public $dataVitalSign = [];
    public $dataEvent = [];

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
        $this->getDataVitalSign($dataValidated);

        $callRelationed = $event ? $event->call : $call;
        $newEvent = Event::create($this->dataEvent);
        $newEvent->call()->associate($callRelationed);
        $newEvent->save();

        if($this->notEmptyVitalSign($dataValidated))
        {
            $vitalSign = VitalSign::create($this->dataVitalSign);
            $newEvent->vitalSign()->save($vitalSign);
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
        $this->getDataVitalSign($dataValidated, $event);
        $this->dataEvent['status'] = ($dataValidated["save_close"] == "yes") ? false : $event->status;
        $event->update($this->dataEvent);

        $vitalSign = VitalSign::findOrNew(optional($event->vitalSign)->id);
        $vitalSign->fill($this->dataVitalSign);
        $vitalSign->save();

        $event->vitalSign()->save($vitalSign);
        $event->save();

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

    /**
     * Get field of event and vital sign from dataValidated
     * 
     * @param  array  $dataValidated
     * @param  \App\Models\Samu\Event  $event
     * 
     * @return void
     */
    public function getDataVitalSign($dataValidated, Event $event = null)
    {
        $this->dataVitalSign['fc'] = $dataValidated['fc'];
        $this->dataVitalSign['fr'] = $dataValidated['fr'];
        $this->dataVitalSign['pa'] = $dataValidated['pa'];
        $this->dataVitalSign['pam'] = $dataValidated['pam'];
        $this->dataVitalSign['gl'] = $dataValidated['gl'];
        $this->dataVitalSign['soam'] = $dataValidated['soam'];
        $this->dataVitalSign['soap'] = $dataValidated['soap'];
        $this->dataVitalSign['hgt'] = $dataValidated['hgt'];
        $this->dataVitalSign['fill_capillary'] = $dataValidated['fill_capillary'];
        $this->dataVitalSign['t'] = $dataValidated['t'];
        
        if($dataValidated['registered_at'])
        {
            $date = $this->getDate($event);
            $this->dataVitalSign['registered_at'] = $date . $dataValidated['registered_at'];
        }

        unset($dataValidated['fc']);
        unset($dataValidated['fr']);
        unset($dataValidated['pa']);
        unset($dataValidated['pam']);
        unset($dataValidated['gl']);
        unset($dataValidated['soam']);
        unset($dataValidated['soap']);
        unset($dataValidated['hgt']);
        unset($dataValidated['fill_capillary']);
        unset($dataValidated['t']);
        unset($dataValidated['registered_at']);

        $this->dataEvent = $dataValidated;
    }

    /**
     * Get the date for the registered_at 
     * 
     * @param  \App\Models\Samu\Event  $event
     * @return string
     */
    public function getDate(Event $event = null)
    {
        $date = now()->format('Y-m-d ');
        if($event && $event->vitalSign && $event->vitalSign->registered_at)
            $date = $event->vitalSign->registered_at->format('Y-m-d ');
        return $date;
    }

    /**
     * checks if at least one data of the vital signs are defined
     * 
     * @param  array  $dataValidated
     * @return boolean
     */
    public function notEmptyVitalSign($dataValidated)
    {
        return (
            $dataValidated['fc'] ||
            $dataValidated['fr'] ||
            $dataValidated['pa'] ||
            $dataValidated['pam'] ||
            $dataValidated['gl'] ||
            $dataValidated['soam'] ||
            $dataValidated['soap'] ||
            $dataValidated['hgt'] ||
            $dataValidated['fill_capillary'] ||
            $dataValidated['t']
        );
    }
}
