<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserAddresses extends Component
{
    public $inputs = [];
    public $i = 1;
    public $addressType;

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function render()
    {
        $this->add(1);
        return view('livewire.user.user-addresses');
    }
}
