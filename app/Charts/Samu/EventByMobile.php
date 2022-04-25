<?php

namespace App\Charts\Samu;

use App\Models\Samu\Event;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EventByMobile extends Chart
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
        $now = Carbon::now();
        
        $this->myLabel = collect([]);
        $this->myDataset = collect([]);

        $events = Event::query()
            ->with('mobile')
            ->whereHas('mobile', function ($query) {
                return $query->whereName('SAMU');
            })
            ->select('mobile_id', DB::raw('count(*) as total'))
            ->whereMonth('date', '=', $now->month)
            ->groupBy('mobile_id')
            ->get();

        foreach($events as $event)
        {
            $nameMobile = $event->mobile 
                ? ($event->mobile->code . ' - ' . $event->mobile->name ) 
                : 'SIN MOBILE';
            
            $this->myLabel->push($nameMobile);
            $this->myDataset->push($event->total);
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
