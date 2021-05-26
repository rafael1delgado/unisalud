<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserContacts extends Component
{
    public $inputs = [];
    public $i = 1;

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }


    public function mount()
    {
        $this->add(1);
    }

    public function render()
    {
        return view('livewire.user.user-contacts');
    }
}
