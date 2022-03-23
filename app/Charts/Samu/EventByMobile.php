<?php

declare(strict_types = 1);

namespace App\Charts\Samu;

use App\Models\Samu\Event;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EventByMobile extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $now = Carbon::now();
        $labels = collect([]);
        $datasets = collect([]);

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
            
            $labels->push($nameMobile);
            $datasets->push($event->total);
        }

        return Chartisan::build()
            ->labels($labels->toArray())
            ->dataset('Eventos atendidos', $datasets->toArray());
    }
}