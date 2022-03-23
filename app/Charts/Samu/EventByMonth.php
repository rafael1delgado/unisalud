<?php

declare(strict_types = 1);

namespace App\Charts\Samu;

use App\Models\Samu\Event;
use Carbon\CarbonPeriod;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EventByMonth extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $end = Carbon::now();
        $start = $end->copy()->subMonths(5);

        $rangeMoths = CarbonPeriod::create($start, '1 month', $end);

        $labels = collect([]);
        $datasets = collect([]);

        foreach($rangeMoths as $month)
        {
            $nameMonth = translateMonth($month->format('F'));
            $year = $month->format('Y');
            
            $totalEvents = Event::query()
                ->whereMonth('date', '=', $month)
                ->whereYear('date', '=', $month)
                ->count();

            $labels->push("$nameMonth-$year");
            $datasets->push($totalEvents);
        }

        return Chartisan::build()
            ->labels($labels->toArray())
            ->dataset('Evento por mes', $datasets->toArray());
    }
}