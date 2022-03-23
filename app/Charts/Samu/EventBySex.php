<?php

declare(strict_types = 1);

namespace App\Charts\Samu;

use App\Models\Samu\Event;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EventBySex extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $now = Carbon::now();
        $sexs = ['MALE', 'FEMALE', 'UNKNOWN', 'OTHER', null];

        $labels = collect([]);
        $datasets = collect([]);

        foreach($sexs as $sex)
        {
            $totalBySex = Event::query()
                ->join('samu_calls', 'samu_calls.id', '=', 'samu_events.call_id')
                ->where('samu_calls.sex', '=', $sex)
                ->whereRaw('MONTH(samu_events.date) = ?', [$now->month])
                ->count();
            
            $labels->push(translateSex($sex));
            $datasets->push($totalBySex);
        }

        return Chartisan::build()
            ->labels($labels->toArray())
            ->dataset('Eventos por sexo', $datasets->toArray());
    }
}