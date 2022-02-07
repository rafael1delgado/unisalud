<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;

class Lunch extends Component
{
    public $mis;
    public $lunch_start;
    public $lunch_end;

    public function lunchStart()
    {
        $this->mis->lunch_start_at = now();
        $this->mis->save();
        $this->mis->fresh();
    }

    public function lunchEnd()
    {
        $this->mis->lunch_end_at = now();
        $this->mis->save();
        $this->mis->fresh();
    }

    public function render()
    {
        return view('livewire.samu.lunch');
    }
}
