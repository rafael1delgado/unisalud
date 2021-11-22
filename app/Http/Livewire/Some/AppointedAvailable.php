<?php

namespace App\Http\Livewire\Some;

use Livewire\Component;
use App\Models\Practitioner;

class AppointedAvailable extends Component
{
    public $from;
    public $to;
    public $practitioners = array();

    public function search(){
        
        $this->validate([
            'from' => 'required',
            'to' => 'required'
        ],
        [
            'from.required' => 'Debe seleccionar fecha desde.',
            'to.required' => 'Debe seleccionar fecha hasta.'
        ]
        );

        $this->practitioners = Practitioner::query()
        ->whereHas('appointments', function ($q){
            $q->where('appointments.status', 'proposed')
            ->where(function ($q) {
                $q->where(function ($q) {
                    $q->whereDate('appointments.start', '<=', $this->from);
                    $q->whereDate('appointments.end', '>=', $this->from);
                })
                ->orWhere(function ($q) {
                    $q->whereDate('appointments.start', '<=', $this->to);
                    $q->whereDate('appointments.end', '>=', $this->to);
                })
                ->orWhere(function($q){
                    $q->whereDate('appointments.start', '>=', $this->from);
                    $q->whereDate('appointments.end', '<=', $this->to);
                });
            });
        })
        ->withCount([
            'appointments as appointments_available_count' => function ($q){
            $q->where('appointments.status', 'proposed')
            ->where(function ($q) {
                $q->where(function ($q) {
                    $q->whereDate('appointments.start', '<=', $this->from);
                    $q->whereDate('appointments.end', '>=', $this->from);
                })
                ->orWhere(function ($q) {
                    $q->whereDate('appointments.start', '<=', $this->to);
                    $q->whereDate('appointments.end', '>=', $this->to);
                })
                ->orWhere(function($q){
                    $q->whereDate('appointments.start', '>=', $this->from);
                    $q->whereDate('appointments.end', '<=', $this->to);
                });
            });
        }])
        ->get();

        // \Debugbar::info($this->practitioners);
    }

    public function appoint($pendingPractitionerId){
        $from = $this->from;
        $to = $this->to;
        return redirect()->route('some.appointment.pending_practitioner', compact('pendingPractitionerId', 'from', 'to'));
    }

    public function render()
    {
        return view('livewire.some.appointed-available');
    }
}
