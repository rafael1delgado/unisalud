<?php

namespace App\Http\Livewire\Some;

use App\Models\Some\ExternalIncomingSic;
use App\Models\Some\Sic;
use Exception;
use Illuminate\Support\Facades\DB;
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

    /**
     * @throws Exception
     */
    public function pertinence()
    {
      DB::beginTransaction();

        try {
            if ($this->action == 'pertinent') {
                $newSic = $this->sic->replicate([
                    'sic_status_id'
                ]);
                $newSic->sic_status_id = 2; //Pertinente

                $newSic = $newSic->toArray();
                Sic::Create($newSic);

                $this->sic->forceDelete();
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
