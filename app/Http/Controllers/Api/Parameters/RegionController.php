<?php

namespace App\Http\Controllers\Api\Parameters;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function communes(Region $region)
    {
        return response()->json(['communes' => $region->communes]);
    }
}
