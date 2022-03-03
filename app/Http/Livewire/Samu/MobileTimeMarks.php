<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use App\Models\Samu\Shift;

class MobileTimeMarks extends Component
{
    public $openShift;
    public $selectedMis = null;

    public function mount()
    {
        $this->openShift = Shift::where('status',true)->first();
    }

    public function selectMis($id)
    {
        $this->selectedMis = $id;
    }
    
    public function cancel()
    {
        $this->selectedMis = null;
    }

    public function render()
    {
        return view('livewire.samu.mobile-time-marks');
    }
}
