<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Traits\GoogleToken;
use Illuminate\Support\Facades\Http;

class PatientSearch extends Component
{
    use GoogleToken;

    public $searchf = null;

    public function render()
    {
//        $url = $this->getUrlBase().'Patient'. ($this->searchf ? '?name:contains='.$this->searchf : '/');
//        $response = Http::withToken($this->getToken())->get($url);
//        // dd($this->getToken());
//        $query = $response->json();

//        if($query['total']>0) {
//            $patients = $query['entry'];
//        }
//        else $patients = array();

        $patients = User::query()
            ->whereHas('officialHumanName', function ($query) {
                $query->where('text', 'like', "%$this->searchf");
            })
            ->get();

        return view('livewire.patient-search', ['patients' => $patients]);
    }
}
