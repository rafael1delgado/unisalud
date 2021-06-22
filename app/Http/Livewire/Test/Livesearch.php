<?php

namespace App\Http\Livewire\Test;

use Livewire\Component;
use App\Models\Commune;

class Livesearch extends Component
{
    public $search;
    public $communes;

    public function render()
    {
        if($this->search) {
            $this->communes = Commune::where('name','LIKE','%'.$this->search.'%')->get();
        }
        else  {
            $this->communes = array();
        }
        return view('livewire.test.livesearch');
    }
}
