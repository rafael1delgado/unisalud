<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use App\Models\Samu\Event;

class FindEvent extends Component
{
    public $event_id;
    public $events = null;

    public function find()
    {
        $this->events = Event::where('id',$this->event_id)->get();
        debug($this->events);
    }
    public function render()
    {
        return view('livewire.samu.find-event');
    }
}
