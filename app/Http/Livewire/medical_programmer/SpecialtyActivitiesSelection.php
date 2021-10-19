<?php

namespace App\Http\Livewire\medical_programmer;

use Livewire\Component;
use App\Models\MedicalProgrammer\Activity;
use App\Models\MedicalProgrammer\SpecialtyActivity;
use App\Models\MedicalProgrammer\ProfessionActivity;

class SpecialtyActivitiesSelection extends Component
{
    public $specialties;
    public $professions;
    public $activities;
    public $specialty_id;
    public $profession_id;
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
        if ($this->profession_id != null) {
          $this->activities = Activity::whereHas('professions', function ($query) {
                                          return $query->where('profession_id', $this->profession_id);
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
        if ($this->profession_id != null && $this->activity_id != null) {
          $profession_activities = ProfessionActivity::where('profession_id',$this->profession_id)
                                                   ->where('activity_id',$this->activity_id)
                                                   ->get();
          if ($profession_activities->count() > 0) {
            $this->performance = $profession_activities->first()->performance;
          }
        }

        return view('livewire.medical_programmer.specialty-activities-selection');
    }
}
