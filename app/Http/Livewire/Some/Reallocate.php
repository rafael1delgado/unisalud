<?php

namespace App\Http\Livewire\Some;

use App\Models\MedicalProgrammer\Profession;
use App\Models\MedicalProgrammer\Specialty;
use App\Models\Practitioner;
use App\Models\Some\Appointment;
use Carbon\Carbon;
use Livewire\Component;

class Reallocate extends Component
{

    public $specialties;
    public $professions;
    public $practitioners;
    public $type;
    public $specialty_id;
    public $profession_id;
    public $practitioner_id;
    public $selectedDateFrom;
    public $selectedPractitioner;
    public $appointments;


    public function getPractitioners()
    {
        $this->specialties = null;
        $this->professions = null;
        if ($this->type != null) {
            if ($this->type == "Médico") {
                $this->specialties = Specialty::orderBy('specialty_name', 'ASC')->get();
            } else {
                $this->professions = Profession::orderBy('profession_name', 'ASC')->get();
            }
        }

        $this->practitioners = null;
        if ($this->specialty_id != null) {

            $this->practitioners = Practitioner::where('specialty_id', $this->specialty_id)
                ->get();
        }

        if ($this->profession_id != null) {

            $this->practitioners = Practitioner::whereHas('user', function ($query) {
                return $query->whereHas('userProfessions', function ($query) {
                    return $query->where('profession_id', $this->profession_id);
                });
            })->get();
        }


    }

    public function getAppointments()
    {
        if ($this->practitioner_id) {
            $this->selectedPractitioner = Practitioner::find($this->practitioner_id)->user;
//            dd($this->selectedPractitioner);
        }

        $query = Appointment::query();

        $query->when($this->selectedDateFrom != null, function ($q) {
            return $q->whereDate('start', '>=', Carbon::now()->toDateString());
        });

        $query->whereHas('theoreticalProgramming', function ($q) {
            return $q->where('specialty_id', $this->specialty_id);
        });

        $query->when($this->selectedPractitioner != null, function ($q)  {
            return $q->whereHas('theoreticalProgramming', function ($q)  {
                return $q->where('user_id', $this->selectedPractitioner->id);
            });
        });

        $query->where('status', 'booked');

        $query->orderBy('start');

        $this->appointments = $query->get();

//        dd($this->appointments);

//        $this->selectedPractitioner = Practitioner::find($this->practitioner_id);

    }

    public function render()
    {

        return view('livewire.some.reallocate');
    }
}
