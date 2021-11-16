<?php

namespace App\Http\Livewire\Some;

use App\Models\Location;
use App\Models\MedicalProgrammer\Profession;
use App\Models\MedicalProgrammer\Specialty;
use App\Models\Practitioner;
use App\Models\Some\Appointment;
use App\Models\Some\Sic;
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
    public $selectedOverbookingAppointments = [];
    public $profession_id;
    public $type;
    public $specialty_id;
    public $professions;
    public $specialties;
    public $practitioners;
    public $practitioner_id;
    public $appointments_from;
    public $appointments_to;
    public $dv;
    public $locations;
    public $selectedLocationId;
    public $patientInstruction;
    // public $appointmentId; //Viene por parámetro 
    // public $pendingPractitionerId; //Viene por parámetro

    protected $listeners = [
        'userSelected' => 'setUser',
    ];

    public function mount($appointmentId = null, $pendingPractitionerId = null, $from = null, $to = null, $interconsultationId = null)
    {
        if ($appointmentId) {
            $appointment = Appointment::find($appointmentId);
            $user = $appointment->users()->first();

            $this->run = $user->identifierRun->value;
            $this->setDv();
            $this->searchUser();
        }
        if ($pendingPractitionerId) {
            $pendingPractitioner = Practitioner::find($pendingPractitionerId);
            // dd($practitioner);
            if ($pendingPractitioner->profession_id == 12) {
                $this->type = 'Médico';
                $this->specialty_id = $pendingPractitioner->specialty_id;
            } else {
                $this->type = 'No médico';
                $this->profession_id = $pendingPractitioner->profession_id;
            }

            $this->getPractitioners();
            $this->practitioner_id = $pendingPractitioner->id;
            $this->appointments_from = $from;
            $this->appointments_to = $to;

            $this->searchAppointments();
        }
        if($interconsultationId){
            $sic = Sic::find($interconsultationId);
            $this->run = $sic->patient_rut;
            $this->setDv();
            $this->searchUser();
        }
    }

    /**
     * @var Location[]|\Illuminate\Database\Eloquent\Collection|mixed
     */

    public function searchUser()
    {
        if ($this->run) {
            $this->user = User::getUserByRun($this->run);
        } elseif ($this->name) {
            $this->user = User::getUsersByName($this->name)->first();
        }

        if ($this->user) {
            $this->appointmentsHistory = $this->user->appointments()->withTrashed()->get();
        }


        $this->validate(
            [
                'user' => 'required'
            ],
            [
                'user.required' => 'No existe paciente.'
            ]
        );
    }

    public function setDv()
    {
        $run = intval($this->run);
        $s = 1;
        for ($m = 0; $run != 0; $run /= 10)
            $s = ($s + $run % 10 * (9 - $m++ % 6)) % 11;
        $this->dv = chr($s ? $s + 47 : 75);
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

        // $query->whereHas('theoreticalProgramming', function ($q) {
        //     return $q->where('specialty_id', $this->specialty_id);
        // });

        $query->whereHas('practitioners', function ($q) {
            return $q->when($this->specialty_id != null, function ($query) {
                $query->where('specialty_id', $this->specialty_id);
            })
                ->when($this->profession_id != null, function ($query) {
                    $query->where('profession_id', $this->profession_id);
                });
        });

        // $query->when($userPractitioner != null, function ($q) use ($userPractitioner) {
        //     return $q->whereHas('theoreticalProgramming', function ($q) use ($userPractitioner) {
        //         return $q->where('user_id', $userPractitioner->id);
        //     });
        // });

        $query->when($userPractitioner != null, function ($q) use ($userPractitioner) {
            return $q->whereHas('practitioners', function ($q) use ($userPractitioner) {
                return $q->where('user_id', $userPractitioner->id);
            });
        });

        $query->where('status', 'proposed')->orWhere('status', 'booked');

        $query->orderBy('start');

        $this->appointments = $query->get();

        $this->validate(
            [
                'appointments' => 'required'
            ],
            [
                'appointments.required' => 'No se encuentran citas.'
            ]
        );
    }

    public function asignAppointment()
    {
        if (count($this->selectedAppointments) > 0) {
            $selectedAppointments = Appointment::whereIn('id', [$this->selectedAppointments]);

            foreach ($selectedAppointments->get() as $selectedAppointment) {
                $selectedAppointment->users()->save($this->user, ['required' => 'required', 'status' => 'accepted']);
                $selectedAppointment->practitioners()->updateExistingPivot($this->practitioner_id, ['required' => 'required', 'status' => 'accepted']);
                if ($this->selectedLocationId) {
                    $selectedAppointment->locations()->save(Location::find($this->selectedLocationId), ['required' => 'required', 'status' => 'accepted']);
                }
            }

            $selectedAppointments->update(
                [
                    'status' => 'booked',
                    'patient_instruction' => $this->patientInstruction,
                ]

            );

            session()->flash('success', 'Cita asignada');
        }

        if (count($this->selectedOverbookingAppointments) > 0) {
            $selectedOverbookingAppointments = Appointment::whereIn('id', [$this->selectedOverbookingAppointments])->get();

            foreach ($selectedOverbookingAppointments as $selectedOverbookingAppointment) {
                $duplicateSelectedOverbookingAppointment = $selectedOverbookingAppointment->replicate();
                $duplicateSelectedOverbookingAppointment->cod_con_appointment_type_id = 6;
                $duplicateSelectedOverbookingAppointment->status = 'booked';
                $duplicateSelectedOverbookingAppointment->patient_instruction = $this->patientInstruction;
                $duplicateSelectedOverbookingAppointment->save();

                $duplicateSelectedOverbookingAppointment->users()->save($this->user, ['required' => 'required', 'status' => 'accepted']);
                $duplicateSelectedOverbookingAppointment->practitioners()->updateExistingPivot($this->practitioner_id, ['required' => 'required', 'status' => 'accepted']);

                if ($this->selectedLocationId) {
                    $duplicateSelectedOverbookingAppointment->locations()->save(Location::find($this->selectedLocationId), ['required' => 'required', 'status' => 'accepted']);
                }
            }

            session()->flash('success', 'Cita de sobrecupo asignada');
        }

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

        $this->locations = Location::all();
    }

    public function cancelAppointment($appointmentId)
    {
        $appointment = Appointment::find($appointmentId);

        $duplicateAppointment = $appointment->replicate();
        $duplicateAppointment->status = 'proposed';
        $duplicateAppointment->save();

        $ids = $appointment->users()->allRelatedIds();
        foreach ($ids as $id) {
            $appointment->users()->updateExistingPivot($id, [
                'status' => 'declined',
            ]);
        }

        $ids = $appointment->practitioners()->allRelatedIds();
        foreach ($ids as $id) {
            $appointment->practitioners()->updateExistingPivot($id, [
                'status' => 'tentative',
            ]);
        }

        $appointment->status = 'cancelled';
        $appointment->delete();
        $appointment->save();

        if ($this->user) {
            $this->user->refresh();
            $this->appointmentsHistory = $this->user->appointments()->withTrashed()->get();
        }
    }

    public function render()
    {
        return view('livewire.some.asign-appointment');
    }
}
