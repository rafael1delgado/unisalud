<?php

namespace App\Http\Livewire\User;

use DebugBar\DebugBar;
use Livewire\Component;

class UserIdentifiers extends Component
{
    public $i = -1;
    public $patient;
    public $identifiers = [];
    public $identifierTypes;

    public function mount()
    {
        //Agrega inputs según cantidad de identifiers que tenga
        if ($this->patient && $this->patient->identifiers()->count() > 0) {
            for ($i = 0; $i < $this->patient->identifiers()->count(); $i++) {
                $this->add($i);
            }
        } else {
            $this->add(0);
        }


        // Agrega identifiers al editar
        if ($this->patient && $this->patient->identifiers()->count() > 0) {
            foreach ($this->identifiers as $key => $value) {
                $this->identifiers[$key]['id'] = $this->patient->identifiers->slice($key, 1)->first()->id;
                $this->identifiers[$key]['use'] = $this->patient->identifiers->slice($key, 1)->first()->use;
                $this->identifiers[$key]['id_type'] = $this->patient->identifiers->slice($key, 1)->first()->cod_con_identifier_type_id;
                $this->identifiers[$key]['system'] = $this->patient->identifiers->slice($key, 1)->first()->system;
                $this->identifiers[$key]['value'] = $this->patient->identifiers->slice($key, 1)->first()->value;
                $this->identifiers[$key]['dv'] = $this->patient->identifiers->slice($key, 1)->first()->dv;
                $this->identifiers[$key]['created_at'] = $this->patient->identifiers->slice($key, 1)->first()->created_at;
            }
        }

        if(request()->session()->has('request_match')){
            $match_identifiers = request()->session()->get('request_match');
            for($i = 0; $i < count($match_identifiers['identifier_id']); $i++)
                $this->identifiers[++$this->i] = [
                    'id' => $match_identifiers['identifier_id'][$i],
                    'use' => $match_identifiers['id_use'][$i],
                    'id_type' => $match_identifiers['id_type'][$i],
                    'value' => $match_identifiers['id_value'][$i],
                    'dv' => $match_identifiers['id_dv'][$i]
                ];
        }
    }

    public function add()
    {
        $this->i++;
        $this->identifiers[$this->i]['id_type'] = 1;
        $this->identifiers[$this->i]['value'] = '';
        $this->identifiers[$this->i]['dv'] = '';
    }

    public function remove($i)
    {
        unset($this->identifiers[$i]);
    }

    public function setDv($value)
    {
        if ($this->identifiers[$value]['id_type'] == 1) {
            $run = intval($this->identifiers[$value]['value']);
            $s = 1;
            for ($m = 0; $run != 0; $run /= 10)
                $s = ($s + $run % 10 * (9 - $m++ % 6)) % 11;
            $this->identifiers[$value]['dv'] = chr($s ? $s + 47 : 75);
        }
    }

    public function render()
    {
        return view('livewire.user.user-identifiers');
    }
}
