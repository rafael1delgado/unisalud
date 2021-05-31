<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserAddresses extends Component
{
    public $inputs = [];
    public $i = 1;

    public $communes;
    public $regions;
    public $countries;
    public $patient;

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
        if ($this->patient && $this->patient->addresses()->count() > 0) {
            for ($i = 0; $i < $this->patient->addresses()->count(); $i++) {
                $this->add($i);
            }
        }

        $this->add(1);
    }

    public function render()
    {
        return view('livewire.user.user-addresses');
    }
}
