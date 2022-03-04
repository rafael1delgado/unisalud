<?php

namespace App\Http\Controllers\Api\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\Call;

class CallController extends Controller
{
    public function index()
    {
        $calls = Call::query()
            ->withCount(['events' => function ($query) {
                $query->whereStatus(true);
            }])
            ->having('events_count', '>', 0)
            ->withClassification(['T1', 'T2', 'NM'])
            ->get();

        return response()->json(['calls' => $calls]);
    }
}
