<?php

namespace App\Http\Livewire\medical_programmer;

use Livewire\Component;
use App\Models\MedicalProgrammer\Specialty;
use App\Models\MedicalProgrammer\Profession;
use App\Models\User;

class SelectMedProgEmployee extends Component
{
    public $type;
    public $specialties;
    public $professions;
    public $specialty_id;
    public $profession_id;
    public $users;

    public function render()
    {
        $this->specialties = null;
        $this->professions = null;
        if ($this->type != null) {
          if ($this->type == "Médico") {
            $this->specialties = Specialty::orderBy('specialty_name','ASC')->get();
          }else{
            $this->professions = Profession::orderBy('profession_name','ASC')->get();
          }
        }

        $this->users = null;
        if ($this->specialty_id != null) {
          $this->users = User::whereHas('userSpecialties', function ($query)  {
                                  return $query->where('specialty_id',$this->specialty_id);
                               })->get();
        }

        if ($this->profession_id != null) {
          $this->users = User::whereHas('userProfessions', function ($query)  {
                                  return $query->where('profession_id',$this->profession_id);
                               })->get();
        }

        return view('livewire.medical_programmer.select-med-prog-employee');
    }
}
