<?php

namespace App\Http\Livewire\Some;

use Livewire\Component;
use App\Models\MedicalProgrammer\Specialty;
use App\Models\Some\ExternalIncomingSic;

class Interconsultation extends Component
{
    public $specialties;
    public $selectedSpecialtyId;
    public $sics = array();

    public function mount(){
        $this->specialties= Specialty::all();
    }

    public function search(){
        $this->sics = ExternalIncomingSic::all();
    }

    public function render(){
        return view('livewire.some.interconsultation');
    }
}
