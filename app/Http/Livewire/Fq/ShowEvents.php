<?php

namespace App\Http\Livewire\Fq;

use Livewire\Component;

class ShowEvents extends Component
{
    public $evento;

    public function showEvents(){
      return "{
                  title: 'Control',
                  start: '2021-06-24T08:00:00',
                  end: '2021-06-24T12:00:00'
                }";
    }

    public function render()
    {
        $this->evento = "{
                    title: 'Control',
                    start: '2021-06-24T08:00:00',
                    end: '2021-06-24T12:00:00'
                  }";

        return view('livewire.fq.show-events');
    }
}
