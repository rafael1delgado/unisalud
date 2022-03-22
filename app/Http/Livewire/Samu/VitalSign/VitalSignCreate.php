<?php

namespace App\Http\Livewire\Samu\VitalSign;

use App\Models\Samu\VitalSign;
use Illuminate\Support\Carbon;
use Livewire\Component;

class VitalSignCreate extends Component
{
    public $event;
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
    public $datetime;
    public $vitalSigns;
    
    public function mount()
    {
        $this->vitalSigns = collect([]);

        if(request()->routeIs('samu.event.edit'))
        {
            if($this->event->vitalSigns)
            {
                foreach($this->event->vitalSigns as $vs)
                {
                    $vs['datetime_format'] = $vs->datetime_format;
                    $this->vitalSigns->push($vs);
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.samu.vital-sign.vital-sign-create');
    }

    public function getData()
    {
        return [
            'datetime' => $this->datetime,
            'fc' => $this->fc,
            'fr' => $this->fr,
            'pa' => $this->pa,
            'pam' => $this->pam,
            'gl' => $this->gl,
            'soam' => $this->soam,
            'soap' => $this->soap,
            'hgt' => $this->hgt,
            'fill_capillary' => $this->fill_capillary,
            't' => $this->t
        ];
    }
    public function addVitalSign()
    {
        $data = $this->getData();

        if(request()->routeIs('samu.event.edit'))
        {
            $vs = VitalSign::create($data);
            $this->event->vitalSigns()->save($vs);
        }
        
        $data['datetime_format'] = Carbon::parse($this->datetime)->format('d/m/Y H:i');
        $this->vitalSigns->push($data);
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
