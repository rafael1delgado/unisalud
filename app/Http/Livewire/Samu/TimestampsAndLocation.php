<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use App\Models\Samu\Event;
use App\Models\Samu\Gps;
use App\Models\Samu\Mobile;

class TimestampsAndLocation extends Component
{
    public $event;
    public $latitude;
    public $longitude;
 
    protected $listeners = ['storeLocation'];

    public function mount(Event $event)
    {

    }

    public function setTime($attribute)
    {
        $this->event->$attribute = now();
        $this->event->save();
        $this->event->refresh();
    }

    public function storeLocation()
    {
        $gps = Gps::Create([
            'latitude'  => $this->latitude,
            'longitude' => $this->longitude,
            'time'      => now()
        ]);
        
        $gps->mobile()->associate($this->event->mobileInService->mobile);
        
        $gps->save();
    }

    public function render()
    {
        return view('livewire.samu.timestamps-and-location');
    }
}
