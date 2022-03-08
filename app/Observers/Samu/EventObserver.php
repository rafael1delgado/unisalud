<?php

namespace App\Observers\Samu;

use App\Models\Samu\Event;
use App\Models\Samu\EventCounter;
use App\Models\Samu\EventUser;
use App\Models\Samu\MobileCrew;
use App\Models\Samu\MobileInService;
use App\Models\Samu\Shift;

class EventObserver
{
    /**
     * Handle the Event "creating" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function creating(Event $event)
    {
        $shift = Shift::whereStatus(true)->first();

        // Order the mobiles
        if($shift && $event->mobileInService)
        {
            $mobileExit = $event->mobileInService;

            $query = $mobilesInService = MobileInService::query()
                ->whereShiftId($shift->id)
                ->whereStatus(true);

            $totalAvailable = $query->count();
            
            $mobileExit->update([
                'position' => $totalAvailable
            ]);

            $mobilesInService = $query->whereNotIn('id', [$mobileExit->id])->orderBy('position', 'asc')->get();

            foreach($mobilesInService as $index => $mobileInService)
            {
                $mobileInService->update([
                    'position' => $index + 1
                ]);
            }

        }
        // Info Event
        $counter = EventCounter::useNext();
        $event->counter   = $counter->counter;
        $event->date      = $counter->date;
        
        $event->creator()->associate(auth()->user());
        $event->shift()->associate($shift);

        $isMobileInService = $shift->MobilesInService->where('mobile_id', $event->mobile_id)->first();

        if($isMobileInService)
        {
            $event->mobileInService()->associate($isMobileInService);
        }
    }

    /**
     * Handle the Event "created" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function created(Event $event)
    {
        $shift = Shift::whereStatus(true)->first();
        $isMobileInService = $shift->MobilesInService->where('mobile_id', $event->mobile_id)->first();

        if($isMobileInService)
        {
            $mobilecrews = MobileCrew::where('mobiles_in_service_id', $isMobileInService->id)->get();

            foreach($mobilecrews as $mobilecrew)
            {
                EventUser::create([
                    'event_id'              => $event->id,
                    'user_id'               => $mobilecrew->user_id,
                    'job_type_id'           => $mobilecrew->job_type_id
                ]);
            }
        }
    }

    /**
     * Handle the Event "deleted" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function deleted(Event $event)
    {
        //
    }

    /**
     * Handle the Event "restored" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function restored(Event $event)
    {
        //
    }

    /**
     * Handle the Event "force deleted" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function forceDeleted(Event $event)
    {
        //
    }
}
