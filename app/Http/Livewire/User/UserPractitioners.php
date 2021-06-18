<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserPractitioners extends Component
{
    public $inputs = [];
    public $i = 1;
    public $patient;
    public $practitioners = [];
    public $organizations;
    public $specialties;

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
        //Agrega inputs según cantidad de practitioners que tenga
        if ($this->patient && $this->patient->practitioners()->count() > 0) {
            for ($i = 0; $i < $this->patient->practitioners()->count(); $i++) {
                $this->add($i);
            }
        } else {
            $this->add(1);
        }

        // Agrega practitioners al editar
        if ($this->patient && $this->patient->practitioners()->count() > 0) {
            foreach ($this->inputs as $key => $value) {
                $this->practitioners[$value]['id'] = $this->patient->practitioners->slice($key, 1)->first()->id;
                $this->practitioners[$value]['active'] = $this->patient->practitioners->slice($key, 1)->first()->active;
                $this->practitioners[$value]['organization_id'] = $this->patient->practitioners->slice($key, 1)->first()->organization_id;
                $this->practitioners[$value]['specialty_id'] = $this->patient->practitioners->slice($key, 1)->first()->specialty_id;
            }
        }
    }

    public function render()
    {
        return view('livewire.user.user-practitioners');
    }
}
