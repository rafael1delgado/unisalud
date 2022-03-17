<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
//use Livewire\WithPagination;
use App\Models\Commune;
use App\Models\Samu\Call;

class SearchCalls extends Component
{
    //use WithPagination;

    public $calls;
    public $date;
    public $address;
    public $commune_id;
    public $communes;

    public function mount()
    {
        /* TODO: Parametrizar */
        $this->communes = Commune::whereHas('samu')
            ->pluck('id','name')
            ->sort();
    }

    public function search()
    {
        $query = Call::query();
        
        if($this->date)
        {
            $query->whereDate('hour', '=', $this->date);
        }
        if($this->address)
        {
            $query->where('address', 'LIKE', '%'.$this->address.'%');
        }
        if($this->commune_id)
        {
            $query->where('commune_id', '=', $this->commune_id);
        }
         
        $this->calls = $query->withTrashed()
            ->latest()
            ->get();
        // $this->calls->paginate(10);
    }

    public function render()
    {
        return view('livewire.samu.search-calls');
    }
}
