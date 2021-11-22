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

    public function appoint($appointmentId){
        return redirect()->route('some.appointment', compact('appointmentId'));
    }

    public function render()
    {
        return view('livewire.some.reallocation-pending');
    }
}
