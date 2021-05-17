<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
Use App\Traits\GoogleToken;
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

//        $patients = User::query()
//
//            ->whereHas('name', 'like', "%$this->searchf%")
//            ->get();



//        if($query['total']>0) {
//            $patients = $query['entry'];
//        }
//        else $patients = array();

        //        return view('livewire.patient-search');
        $patients = User::all();
        return view('livewire.patient-search',['patients' => $patients]);
    }
}
