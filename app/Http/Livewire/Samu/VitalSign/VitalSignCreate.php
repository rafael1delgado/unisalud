<?php

namespace App\Http\Livewire\Samu\VitalSign;

use App\Models\Samu\VitalSign;
use Illuminate\Support\Carbon;
use Livewire\Component;

class VitalSignCreate extends Component
{
    public $event;
    public $edit;

    public $fc;
    public $fr;
    public $pa;
    public $pam;
    public $gl;
    public $soam;
    public $soap;
    public $hgt;
    public $fill_capillary;
    public $t;
    public $registered_at;
    
    public function rules()
    {
        return [
            'fc'                => 'nullable|string|min:0|max:10',
            'fr'                => 'nullable|integer',
            'pa'                => 'nullable|string|min:0|max:255',
            'pam'               => 'nullable|string|min:0|max:255',
            'gl'                => 'nullable|integer',
            'soam'              => 'nullable|integer',
            'soap'              => 'nullable|integer',
            'hgt'               => 'nullable|integer',
            'fill_capillary'    => 'nullable|integer',
            't'                 => 'nullable|numeric',
            'registered_at'     => 'required|date_format:H:i',
        ];
    }

    public function mount()
    {
        if($this->edit && $this->event->vitalSign)
        {
            $this->fr = $this->event->vitalSign->fr;
            $this->fc = $this->event->vitalSign->fc;
            $this->pa = $this->event->vitalSign->pa;
            $this->pam = $this->event->vitalSign->pam;
            $this->gl = $this->event->vitalSign->gl;
            $this->soam = $this->event->vitalSign->soam;
            $this->soap = $this->event->vitalSign->soap;
            $this->hgt = $this->event->vitalSign->hgt;
            $this->fill_capillary = $this->event->vitalSign->fill_capillary;
            $this->t = $this->event->vitalSign->t;
            $this->registered_at = optional($this->event->vitalSign->registered_at)->format('H:i');
        }
    }

    public function render()
    {
        return view('livewire.samu.vital-sign.vital-sign-create');
    }

    public function updateVitalSign()
    {
        $dataValidated = $this->validate();
        $dataValidated['registered_at'] = $this->event->vitalSign->registered_at->format('Y-m-d ') . $dataValidated['registered_at'];
        if($this->edit)
        {
            $this->event->vitalSign->update($dataValidated);
        }
        $this->event->vitalSign->refresh();
    }
}
