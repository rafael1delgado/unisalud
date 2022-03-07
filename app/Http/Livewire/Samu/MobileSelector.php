<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use App\Models\Samu\Shift;
use App\Models\Samu\MobileInService;

class MobileSelector extends Component
{
    public $openShift;
    public $selectedMis = null;

    public function mount()
    {
        $this->openShift = Shift::where('status',true)->first();
    }

    public function selectMis(MobileInService $mis)
    {
        $this->selectedMis = $mis;
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
        return view('livewire.samu.mobile-selector');
    }
}
