<?php

use App\Http\Controllers\Api\Parameters\RegionController;
use App\Http\Controllers\Api\Samu\CallController;
use App\Http\Controllers\Api\Samu\GpsController;
use App\Http\Controllers\Api\Samu\MobileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('calls', [CallController::class, 'index']);
Route::get('mobiles', [MobileController::class, 'index']);
Route::get('region/{region}/communes', [RegionController::class, 'communes']);
Route::get('gps/mobile/{mobile}', [GpsController::class, 'index'])->middleware('auth.basic:,id');
