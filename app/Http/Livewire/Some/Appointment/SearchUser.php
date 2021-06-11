<?php

namespace App\Http\Livewire\Some\Appointment;

use App\Models\User;
use Livewire\Component;

class SearchUser extends Component
{
    public $run;
    public $user;

    public function searchUser()
    {
        $this->user = User::getUserByRun($this->run);
    }

    public function render()
    {
        return view('livewire.some.appointment.search-user');
    }
}
