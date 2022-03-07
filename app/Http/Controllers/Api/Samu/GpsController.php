<?php

namespace App\Http\Controllers\Api\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\Gps;
use App\Models\Samu\Mobile;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GpsController extends Controller
{
    public function index(Request $request, Mobile $mobile)
    {
        $data = $request->all();
        if(isset($data['is_charging']) && isset($data['time']))
        {
            $data['is_charging'] = ($data['is_charging'] == 'false') ? false : true;
            $data['time'] = Carbon::parse($data['time']);
        }

        $gps = Gps::updateOrCreate(
            ['mobile_id' => $mobile->id],
            $data);
        //$gps->mobile()->associate($mobile);
        $gps->save();

        return $mobile;
    }
}
