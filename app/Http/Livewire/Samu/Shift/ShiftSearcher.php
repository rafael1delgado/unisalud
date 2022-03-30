<?php

namespace App\Http\Livewire\Samu\Shift;

use App\Models\Samu\Shift;
use Livewire\Component;

class ShiftSearcher extends Component
{
    public $date;

    public function mount()
    {
        $this->date = now()->format('Y-m-d');
    }

    public function getShifts()
    {
        $shifts = Shift::query()
            ->whereDate('opening_at', '=', $this->date)
            ->orderByDesc('opening_at')
            ->get();

        return $shifts;
    }

    public function render()
    {
        return view('livewire.samu.shift.shift-searcher', ['shifts' => $this->getShifts()]);
    }
}
