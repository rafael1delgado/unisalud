<?php

namespace App\Http\Livewire\medical_programmer;

use Livewire\Component;
use App\Models\MedicalProgrammer\Activity;

class SpecialtyActivities extends Component
{
    public $specialties;
    public $activities;
    public $specialty_id;

    public function render()
    {
        if ($this->specialty_id != null) {
          $this->activities = Activity::whereHas('specialties', function ($query) {
                                          return $query->where('specialty_id', $this->specialty_id);
                                        })->get();
        }

        return view('livewire.medical_programmer.specialty-activities');
    }
}
