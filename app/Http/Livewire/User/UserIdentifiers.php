<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserIdentifiers extends Component
{
    public $inputs = [];
    public $i = 0;
    public $patient;
    public $identifiers = [];
    public $identifierTypes;
    public $readonlyDv = [];


    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->readonlyDv, 'readonly');
        array_push($this->inputs, $i);
        $this->identifiers[$i]['id_type'] = 1;
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
//        unset($this->identifiers[$i]);
    }

    public function setReadonlyDv($value)
    {
        if ($this->identifiers[$value]['id_type'] == 1)
            $this->readonlyDv[$value] = 'readonly';
        else
            $this->readonlyDv[$value] = '';
    }

    public function setDv($value)
    {
        if ( count($this->identifiers) > 0  && $this->identifiers[$value]['id_type'] == 1) {
            $run = intval($this->identifiers[$value]['value']);
            $s = 1;
            for ($m = 0; $run != 0; $run /= 10)
                $s = ($s + $run % 10 * (9 - $m++ % 6)) % 11;
            $this->identifiers[$value]['dv'] = chr($s ? $s + 47 : 75);
        }
    }


    public function mount()
    {
        $this->readonlyDv[1] = 'readonly';

        //Agrega inputs según cantidad de identifiers que tenga
        if ($this->patient && $this->patient->identifiers()->count() > 0) {
            for ($i = 0; $i < $this->patient->identifiers()->count(); $i++) {
                $this->add($i);
            }
        } else {
            $this->add(1);
        }


        // Agrega identifiers al editar
        // dd($this->patient->identifiers()->get());
        if ($this->patient && $this->patient->identifiers()->count() > 0) {
            foreach ($this->inputs as $key => $value) {
                $this->identifiers[$value]['id'] = $this->patient->identifiers->slice($key, 1)->first()->id;
                $this->identifiers[$value]['use'] = $this->patient->identifiers->slice($key, 1)->first()->use;
                $this->identifiers[$value]['id_type'] = $this->patient->identifiers->slice($key, 1)->first()->cod_con_identifier_type_id;
                $this->identifiers[$value]['system'] = $this->patient->identifiers->slice($key, 1)->first()->system;
                $this->identifiers[$value]['value'] = $this->patient->identifiers->slice($key, 1)->first()->value;
                $this->identifiers[$value]['dv'] = $this->patient->identifiers->slice($key, 1)->first()->dv;
            }
        }
    }

    public function render()
    {
        return view('livewire.user.user-identifiers');
    }
}
