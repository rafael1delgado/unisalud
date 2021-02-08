<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClaveUnicaController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/claveunica', [ClaveUnicaController::class,'autenticar'])->name('claveunica.login');
Route::get('/claveunica/callback', [ClaveUnicaController::class,'callback'])->name('claveunica.callback');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('patient')->name('patient.')->group(function(){
    Route::get('/', [PatientController::class, 'index'])->name('index');
    Route::post('/', [PatientController::class, 'store'])->name('store');
    Route::get('/create', [PatientController::class, 'create'])->name('create');
    Route::get('/{patient}', [PatientController::class, 'show'])->name('show');
    Route::put('/{patient}', [PatientController::class, 'update'])->name('update');
    Route::delete('/{patient}', [PatientController::class, 'destroy'])->name('destroy');
    Route::get('/{patient}/edit', [PatientController::class, 'edit'])->name('edit');
});

Route::get('/local-login/{run}', [ProfileController::class, 'login']);
Route::get('/logout', [ProfileController::class, 'logout'])->name('logout');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
