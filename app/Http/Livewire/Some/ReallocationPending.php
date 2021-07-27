<?php

namespace App\Http\Livewire\Some;

use App\Models\Some\Appointment;
use Livewire\Component;

class ReallocationPending extends Component
{
    public $appointments;

    public function mount()
    {
        $this->appointments = Appointment::query()
            ->where('status', 'waitlist')
            ->get();
    }

    public function render()
    {
        return view('livewire.some.reallocation-pending');
    }
}
