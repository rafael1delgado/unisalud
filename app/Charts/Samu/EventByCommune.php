<?php

declare(strict_types = 1);

namespace App\Charts\Samu;

use App\Models\Samu\Event;
use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EventByCommune extends BaseChart
{
    public ?string $name = 'event_by_commune_month';

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $now = Carbon::now();

        $events = Event::query()
            ->with('commune')
            ->select('commune_id', DB::raw('count(*) as total'))
            ->whereMonth('date', '=', $now->month)
            ->groupBy('commune_id')
            ->get();

        $labels = collect([]);
        $datasets = collect([]);

        foreach($events as $event)
        {
            $nameCommune = $event->commune ? $event->commune->name : 'NO INFORMADO';
            $labels->push(Str::upper($nameCommune));
            $datasets->push($event->total);
        }

        return Chartisan::build()
            ->labels($labels->toArray())
            ->dataset('Eventos atendidos', $datasets->toArray());
    }
}