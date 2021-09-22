<?php

namespace App\Http\Livewire\Some;

use Livewire\Component;
use App\Models\MedicalProgrammer\Activity;
use App\Models\MedicalProgrammer\Specialty;

class Interconsultation extends Component
{
    public $specialties;
    public $specialty_id;
    public $interconsults;
    protected $fillable = [
        'specialty_id'
    ];
    
    public function render(){
        return view('livewire.some.interconsultation');
    }
    public function mount(){
        $this->specialties= Specialty::all();
    }
}