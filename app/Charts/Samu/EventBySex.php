<?php

namespace App\Charts\Samu;

use App\Models\Samu\Event;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Carbon;

class EventBySex extends Chart
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
        $sexs = ['MALE', 'FEMALE', 'UNKNOWN', 'OTHER', null];
        
        $this->myLabel = collect([]);
        $this->myDataset = collect([]);

        foreach($sexs as $sex)
        {
            $totalBySex = Event::query()
                ->join('samu_calls', 'samu_calls.id', '=', 'samu_events.call_id')
                ->where('samu_calls.sex', '=', $sex)
                ->whereRaw('MONTH(samu_events.date) = ?', [$now->month])
                ->count();
            
            $this->myLabel->push(translateSex($sex));
            $this->myDataset->push($totalBySex);
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
