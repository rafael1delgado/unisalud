<?php

namespace App\Http\Livewire\Some;

use App\Models\Some\Sic;
use App\Models\Some\SicStatus;
use Livewire\Component;
use App\Models\MedicalProgrammer\Specialty;
use App\Models\Some\ExternalIncomingSic;

class Interconsultation extends Component
{
    public $specialties;
    public $selectedSpecialtyId;
    public $dateFrom;
    public $dateTo;
    public $statuses;
    public $selectedStatusId;
    public $sics = array();

    public function mount()
    {
        $this->specialties = Specialty::all();
        $this->statuses = SicStatus::all();
        $this->selectedStatusId = 1;
    }

    public function search()
    {
        if ($this->selectedStatusId == 1) { //Pendiente
            $this->sics = ExternalIncomingSic::query()
                ->when($this->dateFrom != null && $this->dateTo != null, function ($q) {
                    $q->whereBetween('pcdFechaSolic', [$this->dateFrom, $this->dateTo]);
                })
                ->get();
        } else {
            $this->sics = Sic::query()
                ->whereHas('status', function ($q) {
                    $q->where('id', $this->selectedStatusId);
                })
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.some.interconsultation');
    }
}
