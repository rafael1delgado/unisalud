<?php

namespace App\Http\Livewire\Samu\VitalSign;

use App\Models\Samu\VitalSign;
use Illuminate\Support\Carbon;
use Livewire\Component;

class VitalSignCreate extends Component
{
    public $event;
    public $edit;

    public function render()
    {
        return view('livewire.samu.vital-sign.vital-sign-create');
    }
}
