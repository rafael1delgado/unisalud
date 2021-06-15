<?php

namespace App\Http\Livewire\Some;

use App\Models\User;
use Livewire\Component;

class Appointment extends Component
{
    public $run;
    public $user;
    public $appointments;
    public $selectedAppointments = [];

    public function searchUser()
    {
        $this->user = User::getUserByRun($this->run);
    }

    public function searchAppointments()
    {
        $this->appointments = \App\Models\Some\Appointment::all();
    }

    public function asignAppointment()
    {
        $selectedAppointments = \App\Models\Some\Appointment::find([$this->selectedAppointments]);
        dump($selectedAppointments);
    }

    public function render()
    {
        return view('livewire.some.appointment');
    }
}
