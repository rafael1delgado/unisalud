<?php

namespace App\Http\Livewire\medical_programmer;

use Livewire\Component;

use App\Models\MedicalProgrammer\SpecialtyActivity;
use App\Models\MedicalProgrammer\SubActivity;

class SelectActivSubactiv extends Component
{
    public $specialtyActivities;
    public $subactivities;
    public $specialty_id;
    public $activity_id;

    public function mount(){
      $this->specialtyActivities = SpecialtyActivity::where('specialty_id',$this->specialty_id)->get();
    }

    public function render()
    {
        if ($this->activity_id != null) {
          $this->subactivities = SubActivity::where('activity_id',$this->activity_id)
                                            ->where('specialty_id',$this->specialty_id)->get();
        }
        return view('livewire.medical_programmer.select-activ-subactiv');
    }
}
