<?php

namespace App\Http\Controllers\Api\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\Mobile;

class MobileController extends Controller
{
    public function index()
    {
        $mobiles = Mobile::all();
        return response()->json(['mobiles' => $mobiles]);
    }
}
