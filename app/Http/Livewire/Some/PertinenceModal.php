<?php

namespace App\Http\Livewire\Some;

use App\Models\Some\ExternalIncomingSic;
use App\Models\Some\Sic;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PertinenceModal extends Component
{
    public $externalIncomingSic;
    public $diagnosticHypothesis;
    public $originObservation;
    public $action;
    public $rejectedObservation;

    protected $listeners = ['open' => 'loadPertinence'];

    public function loadPertinence($sicId)
    {
        //        \Debugbar::info($sicId);
        $this->externalIncomingSic = ExternalIncomingSic::find($sicId);
        $this->emit('togglePertinenceModal');
    }

    /**
     * @throws Exception
     */
    public function pertinence()
    {
        DB::beginTransaction();

        try {
            if ($this->action == 'pertinent') {

                $newSic = $this->externalIncomingSic->replicate([
                    'status_id',
                    'diagnosis_hypothesis_destination',
                    'origin_observation'
                ]);
                $newSic->status_id = 2; //Pertinente
                $newSic->diagnosis_hypothesis_destination = $this->diagnosticHypothesis;
                $newSic->origin_observation = $this->originObservation;
                $newSic = $newSic->toArray();
                Sic::Create($newSic);

                $this->externalIncomingSic->forceDelete();
                $this->closeModal();
            } elseif ($this->action == 'nonPertinent') {
                $this->validate([
                    'rejectedObservation' => 'required'
                ], [
                    'rejectedObservation.required' => 'Debe ingresar un motivo.'
                ]);

                $newSic = $this->externalIncomingSic->replicate([
                    'status_id',
                    'rejected_observation'
                ]);
                $newSic->status_id = 5; //Rechazada
                $newSic->rejected_observation = $this->rejectedObservation;
                $newSic = $newSic->toArray();
                Sic::Create($newSic);

                $this->externalIncomingSic->forceDelete();

                $this->closeModal();
            }
            DB::commit();
            $this->emit('refreshSicsList');
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
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
