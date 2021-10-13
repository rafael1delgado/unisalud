<?php

namespace App\Http\Livewire\Some;

use App\Models\Some\ExternalIncomingSic;
use Livewire\Component;

class PertinenceModal extends Component
{

    public $sic;
    public $diagnosticHypothesis;
    public $observation;
    public $action;
    public $motive;

    protected $listeners = ['open' => 'loadPertinence'];

    public function loadPertinence($sicId)
    {
//        \Debugbar::info($sicId);
        $this->sic = ExternalIncomingSic::find($sicId);
        $this->emit('togglePertinenceModal');
    }

    public function pertinence()
    {
        \Debugbar::info($this->diagnosticHypothesis, $this->observation, $this->motive, $this->action);
    }

    public function closeModal()
    {
        $this->emit('togglePertinenceModal');
    }

    public function render()
    {
        return view('livewire.some.pertinence-modal');
    }
}
