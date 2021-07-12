<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Traits\GoogleToken;
use Illuminate\Support\Facades\Http;
use Livewire\WithPagination;

class PatientSearch extends Component
{
    use GoogleToken;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

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
            ->whereHas('humanNames', function ($query) {
                $query->where('text', 'like', "%$this->searchf%")
                ->orwhere('fathers_family', 'like', "%$this->searchf%")
                ->orwhere('mothers_family', 'like', "%$this->searchf%");
            })
            ->paginate(200);

        return view('livewire.patient-search', ['patients' => $patients]);
    }
}
