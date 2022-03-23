<?php

namespace App\Http\Livewire\Samu\Dashboard;

use App\Charts\Samu\EventByCommune;
use Livewire\Component;

class DashboardIndex extends Component
{
    public $month;
    
    public function render()
    {
        return view('livewire.samu.dashboard.dashboard-index');
    }
}
