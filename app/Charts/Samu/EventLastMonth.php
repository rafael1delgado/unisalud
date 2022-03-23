<?php

declare(strict_types = 1);

namespace App\Charts\Samu;

use App\Models\Samu\Event;
use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventLastMonth extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $end = Carbon::now();
        $start = $end->copy()->subDays(29);
        $rangeDates = $start->range($end);
        
        $labels = collect([]);
        $datasets = collect([]);

        foreach($rangeDates as $date)
        {
            $totalEvents = Event::query()
                ->select('date', DB::raw('count(date) as total'))
                ->whereDate('date', '=', $date->format('Y-m-d'))
                ->count();

            $labels->push($date->format('d/m/Y'));
            $datasets->push($totalEvents);
        }

        return Chartisan::build()
            ->labels($labels->toArray())
            ->dataset('Cantidad de Eventos', $datasets->toArray());
    }
}