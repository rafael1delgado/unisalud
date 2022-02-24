<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;

class AssociatedCalls extends Component
{
    public $shift;
    public $currentCall;
    public $call_id;

    public function associate($call_id)
    {
        $this->currentCall->call_id = $call_id;
        $this->currentCall->save();
        $this->currentCall->refresh();
    }

    public function disassociate()
    {
        $this->currentCall->call_id = null;
        $this->currentCall->save();
        $this->currentCall->refresh();
    }

    public function render()
    {
        return view('livewire.samu.associated-calls');
    }
}
