<?php

namespace App\Http\Controllers\Api\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\Shift;

class MobileController extends Controller
{
    public function index()
    {
        $shift = Shift::query()
            ->with('mobilesInService.mobile', 'mobilesInService.event')
            ->whereStatus(true)
            ->first();

        $mobilesInService = ($shift) ? ($shift->mobilesInService) : [];

        return response()->json(['mobilesInService' => $mobilesInService]);
    }
}
