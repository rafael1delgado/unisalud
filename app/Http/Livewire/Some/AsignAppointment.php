<?php

namespace App\Http\Livewire\Some;

use App\Models\MedicalProgrammer\Profession;
use App\Models\MedicalProgrammer\Specialty;
use App\Models\Practitioner;
use App\Models\Some\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class AsignAppointment extends Component
{
    public $run;
    public $name;
    public $user;
    public $appointments;
    public $appointmentsHistory;
    public $selectedAppointments = [];
    public $profession_id;
    public $type;
    public $specialty_id;
    public $professions;
    public $specialties;
    public $practitioners;
    public $practitioner_id;
    public $appointments_from;
    public $appointments_to;

    protected $listeners = ['userSelected' => 'setUser',
    ];

    public function searchUser()
    {
        if ($this->run) {
            $this->user = User::getUserByRun($this->run);
        } elseif ($this->name) {
            $this->user = User::getUsersByName($this->name)->first();
        }

        $this->appointmentsHistory = Appointment::query()
            ->where('user_id', $this->user->id)
            ->get();

//        dd($this->appointmentsHistory);

    }

    public function setUser($userId)
    {
        $this->user = User::find($userId);
    }

    public function searchAppointments()
    {
        //todo validar que this->specialty_id no sea nulo

        $userPractitioner = null;
        if ($this->practitioner_id) {
            $userPractitioner = Practitioner::find($this->practitioner_id)->user;
        }

        $query = Appointment::query();
        $query->when($this->appointments_from === null && $this->appointments_to === null, function ($q) {
            return $q->whereDate('start', '>=', Carbon::now()->toDateString());
        });
        $query->when($this->appointments_from != null && $this->appointments_to != null, function ($q) {
            return $q->whereDate('start', '>=', $this->appointments_from)
                ->whereDate('start', '<=', $this->appointments_to);
        });
        $query->when($this->appointments_from === null && $this->appointments_to != null, function ($q) {
            return $q->whereDate('start', '<=', $this->appointments_to);
        });
        $query->when($this->appointments_from != null && $this->appointments_to === null, function ($q) {
            return $q->whereDate('start', '<=', $this->appointments_from);
        });
        $query->whereHas('theoreticalProgramming', function ($q) {
            return $q->where('specialty_id', $this->specialty_id);
        });
        $query->when($userPractitioner != null, function ($q) use ($userPractitioner) {
            return $q->whereHas('theoreticalProgramming', function ($q) use($userPractitioner) {
                return $q->where('user_id', $userPractitioner->id);
            });
        });

        $this->appointments = $query->get();

    }

    public function asignAppointment()
    {
        $selectedAppointments = Appointment::whereIn('id', [$this->selectedAppointments]);
        $selectedAppointments->update(['user_id' => $this->user->id,
                'practitioner_id' => $this->practitioner_id,
                'status' => 'booked']
        );
        session()->flash('success', 'Cita asignada');
        return redirect()->route('some.appointment');
    }

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

            $this->practitioners = Practitioner::whereHas('user', function ($query) {
                return $query->whereHas('userSpecialties', function ($query) {
                    return $query->where('specialty_id', $this->specialty_id);
                });
            })
                ->get();

//            $this->practitioners = User::whereHas('userSpecialties', function ($query) {
//                return $query->where('specialty_id', $this->specialty_id);
//            })
//                ->has('practitioners')
//                ->get();
        }

        if ($this->profession_id != null) {

            $this->practitioners = Practitioner::whereHas('user', function ($query) {
                return $query->whereHas('userProfessions', function ($query) {
                    return $query->where('profession_id', $this->profession_id);
                });
            })
                ->get();

//            $this->practitioners = User::whereHas('userProfessions', function ($query) {
//                return $query->where('profession_id', $this->profession_id);
//            })
//                ->has('practitioners')
//                ->get();
        }
    }

    public function render()
    {

        return view('livewire.some.asign-appointment');
    }
}
