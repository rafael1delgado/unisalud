<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserPractitioners extends Component
{
    public $i = -1;
    public $patient;
    public $practitioners = [];
    public $organizations;
    public $professions;
    public $specialties;

    public function mount()
    {
        //Agrega inputs según cantidad de practitioners que tenga
        if ($this->patient && $this->patient->practitioners()->count() > 0) {
            for ($i = 0; $i < $this->patient->practitioners()->count(); $i++) {
                $this->add();
            }
        }

        // Agrega practitioners al editar
        if ($this->patient && $this->patient->practitioners()->count() > 0) {
            foreach ($this->practitioners as $key => $value) {
                $this->practitioners[$key]['id'] = $this->patient->practitioners->slice($key, 1)->first()->id;
                $this->practitioners[$key]['active'] = $this->patient->practitioners->slice($key, 1)->first()->active;
                $this->practitioners[$key]['organization_id'] = $this->patient->practitioners->slice($key, 1)->first()->organization_id;
                $this->practitioners[$key]['profession_id'] = $this->patient->practitioners->slice($key, 1)->first()->profession_id;
                $this->practitioners[$key]['specialty_id'] = $this->patient->practitioners->slice($key, 1)->first()->specialty_id;
            }
        }
    }

    public function add()
    {
        $this->i++;
        $this->practitioners[$this->i]['organization_id'] = '';
        $this->practitioners[$this->i]['profession_id'] = '';
        $this->practitioners[$this->i]['specialty_id'] = '';
    }

    public function remove($i)
    {
        unset($this->practitioners[$i]);
    }

    public function render()
    {
        return view('livewire.user.user-practitioners');
    }
}
