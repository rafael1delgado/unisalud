<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserAddresses extends Component
{
    public $inputs = [];
    public $i = 1;
//    public $addressType;

    public $communes;
    public $regions;
    public $countries;

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
        return view('livewire.user.user-addresses');
    }
}
