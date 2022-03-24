<?php

namespace App\Charts\Samu;

use App\Models\Samu\Event;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EventLastMonth extends Chart
{
    public $myLabel;
    public $myDataset;

    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->getData();
    }

    public function getData()
    {
        $end = Carbon::now();
        $start = $end->copy()->subDays(29);
        $rangeDates = $start->range($end);
        
        $this->myLabel = collect([]);
        $this->myDataset = collect([]);

        foreach($rangeDates as $date)
        {
            $totalEvents = Event::query()
                ->select('date', DB::raw('count(date) as total'))
                ->whereDate('date', '=', $date->format('Y-m-d'))
                ->count();

            $this->myLabel->push($date->format('d/m/Y'));
            $this->myDataset->push($totalEvents);
        }
    }

    public function getLabel()
    {
        return $this->myLabel->toArray();
    }

    public function getDataset()
    {
        return $this->myDataset->toArray();
    }
}
