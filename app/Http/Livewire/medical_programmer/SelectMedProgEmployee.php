<?php

namespace App\Http\Livewire\medical_programmer;

use Livewire\Component;
use App\Models\MedicalProgrammer\Specialty;
use App\Models\MedicalProgrammer\Profession;
use App\Models\MedicalProgrammer\Contract;
use App\Models\Practitioner;
use App\Models\User;

class SelectMedProgEmployee extends Component
{
    // public $request;
    public $type;
    public $specialties;
    public $professions;
    public $specialty_id;
    public $profession_id;
    public $users;
    public $user_id;

    public $contract_enable;
    public $contracts;
    public $required_enabled;

    public function render()
    {
        $this->specialties = null;
        $this->professions = null;
        $this->users = null;
        $this->contracts = null;

        if ($this->type != null) {
          if ($this->type == "Médico") {
            $this->specialties = Specialty::orderBy('specialty_name','ASC')->get();
          }else{
            $this->professions = Profession::orderBy('profession_name','ASC')->get();
          }
        }

        if ($this->specialty_id != null) {
          // $this->users = User::whereHas('userSpecialties', function ($query)  {
          //                         return $query->where('specialty_id',$this->specialty_id);
          //                      })->get();
          $this->users = Practitioner::where('specialty_id',$this->specialty_id)->get()->pluck('user');
        }

        if ($this->profession_id != null) {
          // $this->users = User::whereHas('userProfessions', function ($query)  {
          //                         return $query->where('profession_id',$this->profession_id);
          //                      })->get();
          $this->users = Practitioner::where('profession_id',$this->profession_id)->get()->pluck('user');
        }

        if ($this->contract_enable != null) {
          if ($this->user_id != null) {
            $this->contracts = Contract::where('user_id',$this->user_id)->get();
          }
        }


        return view('livewire.medical_programmer.select-med-prog-employee');
    }
}
