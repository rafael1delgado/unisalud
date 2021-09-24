<?php

namespace App\Http\Livewire\Some;

use Livewire\Component;
use App\Models\MedicalProgrammer\ProgrammingProposal;
use App\Models\MedicalProgrammer\ProgrammingProposalDetail;
use App\Models\Some\Appointment;
use Carbon\Carbon;

class OpenPending extends Component
{
    public $programmingProposals = array();
    public $from;
    public $to;

    public function search()
    {
        $programmingProposals = ProgrammingProposal::query()
            ->where('status', 'Confirmado')
            ->where(function ($q) {
                $q->where(function ($q) {
                    $q->where('start_date', '<=', $this->from);
                    $q->where('end_date', '>=', $this->from);
                })
                ->orWhere(function ($q) {
                    $q->where('start_date', '<=', $this->to);
                    $q->where('end_date', '>=', $this->to);
                });
            })
            // ->hasUnopenedDetailsBetween($this->from, $this->to)
            ->get();

        $notOpenedDetailIds = [];
        foreach ($programmingProposals as $key => $programmingProposal) {
            // Obtener rango de fechas a recorrer
            $start_date = ($this->from > $programmingProposal->start_date) ? Carbon::parse($this->from) : $programmingProposal->start_date;
            $end_date = ($this->to < $programmingProposal->end_date) ? Carbon::parse($this->to) : $programmingProposal->end_date;

            // se eliminan antiguos del array (periodos anteriores del ciclo) que se encuentren between de nueva iteración
            // foreach ($programmed_days as $key => $programmed_day) {
            //     if (Carbon::parse($programmed_day['start_date'])->between($start_date, $end_date)) {
            //         unset($programmed_days[$key]);
            //     }
            // }

            // se obtienen los del periodo actual
            while ($start_date <= $end_date) {
                $dayOfWeek = $start_date->dayOfWeek;
                foreach ($programmingProposal->details->where('day', $dayOfWeek) as $key2 => $detail) {
                    //que tengan performance
                    if ($detail->activity->performance != 0) {
                        // verifica si está aperturado o no
                        $start = Carbon::parse($start_date->format('Y-m-d') . " " . $detail->start_hour);
                        if ($detail->appointments->where('start', $start)->count() == 0) {
                            array_push($notOpenedDetailIds, $detail->id);
                        }
                    }
                }
                $start_date->addDays(1);
            }
        }

        $this->programmingProposals = ProgrammingProposal::query()
            ->whereHas('details', function($q) use($notOpenedDetailIds){
                $q->whereIn('id', $notOpenedDetailIds);
            })
            ->get();

        // \Debugbar::info($this->programmingProposals );
    }

    public function open($programmingProposalId)
    {
        return redirect()->route('some.open_tprogrammer', [$programmingProposalId]);
    }

    public function render()
    {
        return view('livewire.some.open-pending');
    }
}
