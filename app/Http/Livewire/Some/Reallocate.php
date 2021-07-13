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

    public $specialtiesFrom;
    public $professionsFrom;
    public $practitionersFrom;
    public $typeFrom;
    public $selectedSpecialtyIdFrom;
    public $selectedProfessionIdFrom;
    public $selectedPractitionerIdFrom;
    public $selectedDateFrom;
    public $selectedPractitionerFrom;

    public $specialtiesTo;
    public $professionsTo;
    public $practitionersTo;
    public $typeTo;
    public $selectedSpecialtyIdTo;
    public $selectedProfessionIdTo;
    public $selectedPractitionerIdTo;
    public $selectedDateTo;
    public $selectedPractitionerTo;
    public $appointments;


    public function getPractitionersFrom()
    {
        $this->specialtiesFrom = null;
        $this->professionsFrom = null;
        if ($this->typeFrom != null) {
            if ($this->typeFrom == "Médico") {
                $this->specialtiesFrom = Specialty::orderBy('specialty_name', 'ASC')->get();
            } else {
                $this->professionsFrom = Profession::orderBy('profession_name', 'ASC')->get();
            }
        }

        $this->practitionersFrom = null;
        if ($this->selectedSpecialtyIdFrom != null) {

            $this->practitionersFrom = Practitioner::where('specialty_id', $this->selectedSpecialtyIdFrom)
                ->get();
        }

        if ($this->selectedProfessionIdFrom != null) {

            $this->practitionersFrom = Practitioner::whereHas('user', function ($query) {
                return $query->whereHas('userProfessions', function ($query) {
                    return $query->where('profession_id', $this->selectedProfessionIdFrom);
                });
            })->get();
        }
    }


    public function getPractitionersTo()
    {
        $this->specialtiesTo = null;
        $this->professionsTo = null;
        if ($this->typeTo != null) {
            if ($this->typeTo == "Médico") {
                $this->specialtiesTo = Specialty::orderBy('specialty_name', 'ASC')->get();
            } else {
                $this->professionsTo = Profession::orderBy('profession_name', 'ASC')->get();
            }
        }

        $this->practitionersTo = null;
        if ($this->selectedSpecialtyIdTo != null) {

            $this->practitionersTo = Practitioner::where('specialty_id', $this->selectedSpecialtyIdTo)
                ->get();
        }

        if ($this->selectedProfessionIdTo != null) {

            $this->practitionersTo = Practitioner::whereHas('user', function ($query) {
                return $query->whereHas('userProfessions', function ($query) {
                    return $query->where('profession_id', $this->selectedProfessionIdTo);
                });
            })->get();
        }
    }


    public function getAppointments()
    {
        if ($this->selectedPractitionerIdFrom) {
            $this->selectedPractitionerFrom = Practitioner::find($this->selectedPractitionerIdFrom)->user;
//            dd($this->selectedPractitioner);
        }

        $query = Appointment::query();

        $query->when($this->selectedDateFrom != null, function ($q) {
            return $q->whereDate('start', '>=', Carbon::now()->toDateString());
        });

        $query->whereHas('theoreticalProgramming', function ($q) {
            return $q->where('specialty_id', $this->selectedSpecialtyIdFrom);
        });

        $query->when($this->selectedPractitionerFrom != null, function ($q)  {
            return $q->whereHas('theoreticalProgramming', function ($q)  {
                return $q->where('user_id', $this->selectedPractitionerFrom->id);
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
