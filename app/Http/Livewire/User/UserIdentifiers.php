<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserIdentifiers extends Component
{
    public $inputs = [];
    public $i = 1;
    public $patient;
    public $identifiers = [];
    public $identifierTypes;

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function mount()
    {
        //Agrega inputs según cantidad de identifiers que tenga
        if ($this->patient && $this->patient->identifiers()->count() > 0) {
            for ($i = 0; $i < $this->patient->identifiers()->count(); $i++) {
                $this->add($i);
            }
        } else {
            $this->add(1);
        }


        // Agrega identifiers al editar
        if ($this->patient && $this->patient->identifiers()->count() > 0) {
            foreach ($this->inputs as $key => $value) {
                $this->identifiers[$value]['id'] = $this->patient->identifiers->slice($key, 1)->first()->id;
                $this->identifiers[$value]['use'] = $this->patient->identifiers->slice($key, 1)->first()->use;
                $this->identifiers[$value]['cod_con_identifier_type_id'] = $this->patient->identifiers->slice($key, 1)->first()->con_con_identifier_type_id;
                $this->identifiers[$value]['system'] = $this->patient->identifiers->slice($key, 1)->first()->system;
                $this->identifiers[$value]['value'] = $this->patient->identifiers->slice($key, 1)->first()->value;
            }
        }
    }

    public function render()
    {
        return view('livewire.user.user-identifiers');
    }
}
