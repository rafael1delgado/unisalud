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
        //Agrega inputs según cantidad de direcciones que tenga
        if ($this->patient && $this->patient->addresses()->count() > 0) {
            for ($i = 0; $i < $this->patient->addresses()->count(); $i++) {
                $this->add($i);
            }
        }
        else {
            $this->add(1);
        }

        // // Agrega unidad organizacional al editar
        // if ($this->signature && $this->signature->signaturesFlowVisator->count() > 0) {
        //     foreach ($this->inputs as $key => $value) {
        //         $this->organizationalUnit[$value] = $this->signature->signaturesFlowVisator->slice($key, 1)->first()->ou_id;
        //     }
        // }
        
    }

    public function render()
    {
        return view('livewire.user.user-addresses');
    }
}
