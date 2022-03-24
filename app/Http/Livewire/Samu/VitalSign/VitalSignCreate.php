<?php

namespace App\Http\Livewire\Samu\VitalSign;

use App\Models\Samu\VitalSign;
use Illuminate\Support\Carbon;
use Livewire\Component;

class VitalSignCreate extends Component
{
    public $event;
    public $edit;
    public $vitalSigns;
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
    public $time;
    
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
            'time'              => 'required|date_format:H:i',
        ];
    }

    public function mount()
    {
        $this->vitalSigns = collect([]);

        if(request()->routeIs('samu.event.edit'))
        {
            if($this->event->vitalSigns)
            {
                foreach($this->event->vitalSigns as $vs)
                {
                    $vs['datetime_format'] = $vs->time_format;
                    $this->vitalSigns->push($vs);
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.samu.vital-sign.vital-sign-create');
    }

    public function addVitalSign()
    {
        $dataValidated = $this->validate();
        $dataValidated['time'] = now()->format('Y-m-d ') . $dataValidated['time'];

        if($this->edit)
        {
            $vs = VitalSign::create($dataValidated);
            $this->event->vitalSigns()->save($vs);
        }
        
        $dataValidated['datetime_format'] = Carbon::parse($dataValidated['time'])->format('d/m/Y H:i');
        $this->vitalSigns->push($dataValidated);
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->datetime = null;
        $this->fc = null;
        $this->fr = null;
        $this->pa = null;
        $this->pam = null;
        $this->gl = null;
        $this->soam = null;
        $this->soap = null;
        $this->hgt = null;
        $this->fill_capillary = null;
        $this->t = null;
    }

    public function deleteVitalSign($index)
    {
        if(isset($this->vitalSigns[$index]['id']))
        {
            $vs = VitalSign::find($this->vitalSigns[$index]['id']);
            $vs->delete();
        }
        $this->vitalSigns->forget($index);
    }
}
