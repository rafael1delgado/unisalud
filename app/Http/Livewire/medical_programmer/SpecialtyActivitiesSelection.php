<?php

namespace App\Http\Livewire\medical_programmer;

use Livewire\Component;
use App\Models\MedicalProgrammer\Activity;
use App\Models\MedicalProgrammer\SpecialtyActivity;

class SpecialtyActivitiesSelection extends Component
{
    public $specialties;
    public $activities;
    public $specialty_id;
    public $activity_id;
    public $performance;

    public function render()
    {
        $this->performance = null;
        if ($this->specialty_id != null) {
          $this->activities = Activity::whereHas('specialties', function ($query) {
                                          return $query->where('specialty_id', $this->specialty_id);
                                        })->get();
        }

        if ($this->specialty_id != null && $this->activity_id != null) {
          $specialty_activities = SpecialtyActivity::where('specialty_id',$this->specialty_id)
                                                   ->where('activity_id',$this->activity_id)
                                                   ->get();
          if ($specialty_activities->count() > 0) {
            $this->performance = $specialty_activities->first()->performance;
          }
        }

        return view('livewire.medical_programmer.specialty-activities-selection');
    }
}
