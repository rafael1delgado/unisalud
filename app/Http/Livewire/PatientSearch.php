<?php

namespace App\Http\Livewire;

use Livewire\Component;
Use App\Traits\GoogleToken;
use Illuminate\Support\Facades\Http;

class PatientSearch extends Component
{
    use GoogleToken;
    public $searchf;

    public function render()
    {
        $url = $this->getUrlBase().'Patient?name:contains=';
        $response = Http::withToken($this->getToken())->get($url.$this->searchf);

        $query = $response->json();
        if($query['total']>0) {
            $patients = $query['entry'];
        }
        else $patients = array();

        return view('livewire.patient-search',['patients' => $patients]);
    }
}
