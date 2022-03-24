<?php

namespace App\Charts\Samu;

use App\Models\Samu\Event;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class EventByCommune extends Chart
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
            ->with('commune')
            ->select('commune_id', DB::raw('count(*) as total'))
            ->whereMonth('date', '=', $now->month)
            ->groupBy('commune_id')
            ->get();

        foreach($events as $event)
        {
            $nameCommune = $event->commune ? $event->commune->name : 'NO INFORMADO';
            $this->myLabel->push(Str::upper($nameCommune));
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
