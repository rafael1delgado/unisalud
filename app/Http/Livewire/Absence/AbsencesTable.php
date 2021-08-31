<?php

namespace App\Http\Livewire\Absence;

use App\Models\Absence;
use Livewire\Component;

use Livewire\WithPagination;

class AbsencesTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.absence.absences-table', [
            'absences' => Absence::with('user', 'contract.service', 'practitioner.organization')->paginate(10),
        ]);
    }
}
