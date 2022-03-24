<?php

namespace App\Charts\Samu;

use App\Models\Samu\Event;
use Carbon\CarbonPeriod;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Carbon;

class EventByMonth extends Chart
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
        $start = $end->copy()->subMonths(5);
        $rangeMoths = CarbonPeriod::create($start, '1 month', $end);
        
        $this->myLabel = collect([]);
        $this->myDataset = collect([]);

        foreach($rangeMoths as $month)
        {
            $nameMonth = translateMonth($month->format('F'));
            $year = $month->format('Y');
            
            $totalEvents = Event::query()
                ->whereMonth('date', '=', $month)
                ->whereYear('date', '=', $month)
                ->count();

            $this->myLabel->push("$nameMonth-$year");
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
