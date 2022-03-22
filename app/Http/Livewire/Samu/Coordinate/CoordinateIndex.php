<?php

namespace App\Http\Livewire\Samu\Coordinate;

use App\Models\Coordinate;
use App\Models\Samu\Call;
use Livewire\Component;

class CoordinateIndex extends Component
{
    public $calls;
    public $selectedCallId  = null;
    public $selectedCoordinate  = null;
    public $selectedCoordinateId = null;
    public $edit = false;
    public $search = null;
    public $paginate = 10;
    public $paginates = [10, 100, 1000, 5000];

    public function mount()
    {
        $this->calls = Call::limit(25)->latest()->get(['id', 'applicant']);
    }

    public function getCoordinates()
    {
        $search = "%" . $this->search . "%";

        $coordinates = Coordinate::query()
            ->when($this->search != '', function($query) use($search) {
                $query->where('name', 'like', $search)
                    ->orWhere('latitude', 'like', $search)
                    ->orWhere('longitude', 'like', $search);
            })
            ->orderByDesc('created_at')
            ->paginate($this->paginate);
        
        return $coordinates;
    }

    public function render()
    {
        return view('livewire.samu.coordinate.coordinate-index',  ['coordinates' => $this->getCoordinates()]);
    }

    public function showButton(Coordinate $coordinate)
    {
        $this->edit = !$this->edit;
        $this->selectedCoordinate = $coordinate;
        $this->selectedCoordinateId = $coordinate->id;
    }

    public function assignCoordinate()
    {
        if($this->selectedCoordinate && $this->selectedCallId)
        {
            $call = Call::find($this->selectedCallId);
            $call->update([
                'latitude' => $this->selectedCoordinate->latitude,
                'longitude' => $this->selectedCoordinate->longitude
            ]);
            $this->selectedCoordinate->call()->associate($call);
            $this->selectedCoordinate->save();
            $this->selectedCallId = null;
            $this->selectedCoordinate = null;
            $this->selectedCoordinateId = null;
            $this->edit = false;
            session()->flash('success', 'Las coordenadas fueron asociada a la llamada con ID: ' . $this->selectedCallId);
        }
       
        $this->render();
    }

    public function deleteCoordinate(Coordinate $coordinate)
    {
        $coordinate->delete();
        session()->flash('success', 'La coordenada fue eliminada exitosamente');
        $this->render();
    }

    public function refreshCoordinates()
    {
        $this->edit = false;
        $this->search = null;
        $this->paginate = 10;
        $this->render();
        $this->mount();
    }
}
