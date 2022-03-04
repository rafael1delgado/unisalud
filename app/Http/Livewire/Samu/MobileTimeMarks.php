<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use App\Models\Samu\Shift;
use App\Models\Samu\MobileInService;
use App\Models\Samu\Event;

class MobileTimeMarks extends Component
{
    public $openShift;
    public $selectedMis = null;
    public $selectedEvent = null;

    public function mount()
    {
        $this->openShift = Shift::where('status',true)->first();
    }

    public function selectMis(MobileInService $mis)
    {
        $this->selectedMis = $mis;
    }

    public function selectEvent(Event $event)
    {
        $this->selectedEvent = $event;
    }
    
    public function cancel($var)
    {
        $this->$var = null;
    }

    public function setTime($attribute)
    {
        $this->selectedEvent->$attribute = now();
        $this->selectedEvent->save();
        $this->selectedEvent->refresh();
    }

    public function render()
    {
        return view('livewire.samu.mobile-time-marks');
    }
}
