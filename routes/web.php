<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClaveUnicaController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Home;

use App\Http\Controllers\Parameter\PermissionController;
use App\Http\Controllers\Profile\ProfileController;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Profile\ObservationController;

use App\Http\Controllers\PatientController;

use App\Http\Controllers\Fq\ContactUserController;
use App\Http\Controllers\Fq\FqRequestController;

use App\Http\Controllers\MedicalProgrammer\OperatingRoomProgrammingController;
use App\Http\Controllers\MedicalProgrammer\RrhhController;
use App\Http\Controllers\MedicalProgrammer\ContractController;
use App\Http\Controllers\MedicalProgrammer\ActivityController;
use App\Http\Controllers\MedicalProgrammer\TheoreticalProgrammingController;
use App\Http\Controllers\MedicalProgrammer\UnscheduledProgrammingController;
use App\Http\Controllers\MedicalProgrammer\CalendarProgrammingController;
use App\Http\Controllers\MedicalProgrammer\OperatingRoomController;
use App\Http\Controllers\MedicalProgrammer\MotherActivityController;
use App\Http\Controllers\MedicalProgrammer\ServiceController;
use App\Http\Controllers\MedicalProgrammer\SpecialtyController;
use App\Http\Controllers\MedicalProgrammer\ProfessionController;
use App\Http\Controllers\MedicalProgrammer\CutOffDateController;
use App\Http\Controllers\MedicalProgrammer\CloneController;
use App\Http\Controllers\MedicalProgrammer\ReportController;


use App\Http\Controllers\MedicalLicenceController;
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

/* Grabar en Google storage  */
// $disk = \Storage::disk('gcs');
// $url = $disk->put('FILE.txt',"hola");

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Auth::routes();

Route::get('/claveunica', [ClaveUnicaController::class,'autenticar'])->name('claveunica');
Route::get('/claveunica/callback', [ClaveUnicaController::class,'callback']);
Route::get('/claveunica/callback-testing', [ClaveUnicaController::class,'callback']);
Route::get('/claveunica/logout', [ClaveUnicaController::class,'logout'])->name('claveunica.logout');

Route::get('/login/{run}', [ProfileController::class, 'login']);
Route::get('/logout', [ProfileController::class,'logout']);

/** Ejempo con livewire */
//Route::get('/home', Home::class)->middleware('auth')->name('home');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::prefix('parameter')->as('parameter.')->middleware('auth')->group(function () {
    Route::resource('permission', PermissionController::class);
});

Route::prefix('profile')->name('profile.')->middleware('auth')->group(function(){
    Route::get('/', [ProfileController::class, 'show'])->name('show');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
    Route::put('/', [ProfileController::class, 'update'])->name('update');
    Route::prefix('observation')->name('observation.')->group(function(){
        Route::get('/', [ObservationController::class, 'index'])->name('index');
        Route::get('/download/{id}', [ObservationController::class, 'download'])->name('download');
    });
});

Route::prefix('user')->name('user.')->middleware('auth')->group(function(){
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{user}', [UserController::class, 'update'])->name('update');
});
Route::prefix('patient')->name('patient.')->middleware('auth')->group(function(){
    Route::get('/', [PatientController::class, 'index'])->name('index');
    Route::post('/', [PatientController::class, 'store'])->name('store');
    Route::get('/create', [PatientController::class, 'create'])->name('create');
    Route::get('/{patient}', [PatientController::class, 'show'])->name('show');
    Route::put('/{patient}', [PatientController::class, 'update'])->name('update');
    Route::delete('/{patient}', [PatientController::class, 'destroy'])->name('destroy');
    Route::get('/{patient}/edit', [PatientController::class, 'edit'])->name('edit');
});

Route::prefix('fq')->as('fq.')->middleware('auth')->group(function(){
    Route::prefix('contact_user')->name('contact_user.')->middleware(['permission:Fq: admin'])->group(function(){
        Route::get('/', [ContactUserController::class, 'index'])->name('index');
        Route::get('/create', [ContactUserController::class, 'create'])->name('create');
        Route::post('/store', [ContactUserController::class, 'store'])->name('store');
    });
    Route::prefix('patient')->name('patient.')->group(function(){
        Route::get('/', [FqPatientController::class, 'index'])->name('index');
        Route::get('/create', [FqPatientController::class, 'create'])->name('create');
    });
    Route::prefix('request')->name('request.')->group(function(){
        Route::get('/', [FqRequestController::class, 'index'])->name('index')
            ->middleware(['permission:Fq: Answer request|Fq: Answer request medicines']);
        Route::get('/own_index', [FqRequestController::class, 'own_index'])->name('own_index');
        Route::get('/create', [FqRequestController::class, 'create'])->name('create');
        Route::post('/store/{contactUser}', [FqRequestController::class, 'store'])->name('store');
        Route::put('/{fqRequest}', [FqRequestController::class, 'update'])->name('update')
            ->middleware(['permission:Fq: Answer request|Fq: Answer request medicines']);;
    });
});

Route::prefix('medical_programmer')->name('medical_programmer.')->middleware('auth')->group(function(){
  Route::prefix('operating_room_programming')->name('operating_room_programming.')->group(function(){
    Route::post('saveMyEvent', [OperatingRoomProgrammingController::class, 'saveMyEvent'])->name('saveMyEvent');
    Route::post('updateMyEvent', [OperatingRoomProgrammingController::class, 'updateMyEvent'])->name('updateMyEvent');
    Route::post('deleteMyEvent', [OperatingRoomProgrammingController::class, 'deleteMyEvent'])->name('deleteMyEvent');
    Route::post('deleteMyEventForce', [OperatingRoomProgrammingController::class, 'deleteMyEventForce'])->name('deleteMyEventForce');

    Route::get('/', [OperatingRoomProgrammingController::class, 'index'])->name('index');
    Route::post('/', [OperatingRoomProgrammingController::class, 'store'])->name('store');
    Route::get('/create', [OperatingRoomProgrammingController::class, 'create'])->name('create');
    Route::get('/{patient}', [OperatingRoomProgrammingController::class, 'show'])->name('show');
    Route::put('/{patient}', [OperatingRoomProgrammingController::class, 'update'])->name('update');
    Route::delete('/{patient}', [OperatingRoomProgrammingController::class, 'destroy'])->name('destroy');
    Route::get('/{patient}/edit', [OperatingRoomProgrammingController::class, 'edit'])->name('edit');
  });

  Route::prefix('rrhh')->name('rrhh.')->group(function(){
    Route::get('/', [RrhhController::class, 'index'])->name('index');
    Route::post('/', [RrhhController::class, 'store'])->name('store');
    Route::get('/create', [RrhhController::class, 'create'])->name('create');
    Route::get('/{rrhh}', [RrhhController::class, 'show'])->name('show');
    Route::put('/{rrhh}', [RrhhController::class, 'update'])->name('update');
    Route::delete('/{rrhh}', [RrhhController::class, 'destroy'])->name('destroy');
    Route::get('/{rrhh}/edit', [RrhhController::class, 'edit'])->name('edit');
  });

  Route::prefix('contracts')->name('contracts.')->group(function(){
    Route::get('/', [ContractController::class, 'index'])->name('index');
    Route::post('/', [ContractController::class, 'store'])->name('store');
    Route::get('/create', [ContractController::class, 'create'])->name('create');
    Route::get('/{contract}', [ContractController::class, 'show'])->name('show');
    Route::put('/{contract}', [ContractController::class, 'update'])->name('update');
    Route::delete('/{contract}', [ContractController::class, 'destroy'])->name('destroy');
    Route::get('/{contract}/edit', [ContractController::class, 'edit'])->name('edit');
  });

  Route::prefix('activities')->name('activities.')->group(function(){
    Route::get('/', [ActivityController::class, 'index'])->name('index');
    Route::post('/', [ActivityController::class, 'store'])->name('store');
    Route::get('/create', [ActivityController::class, 'create'])->name('create');
    Route::get('/{activity}', [ActivityController::class, 'show'])->name('show');
    Route::put('/{activity}', [ActivityController::class, 'update'])->name('update');
    Route::delete('/{activity}', [ActivityController::class, 'destroy'])->name('destroy');
    Route::get('/{activity}/edit', [ActivityController::class, 'edit'])->name('edit');
  });

  Route::prefix('theoretical_programming')->name('theoretical_programming.')->group(function(){
    Route::post('saveMyEvent', [TheoreticalProgrammingController::class, 'saveMyEvent'])->name('saveMyEvent');
    Route::post('updateMyEvent', [TheoreticalProgrammingController::class, 'updateMyEvent'])->name('updateMyEvent');
    Route::post('deleteMyEvent', [TheoreticalProgrammingController::class, 'deleteMyEvent'])->name('deleteMyEvent');
    Route::post('deleteMyEventForce', [TheoreticalProgrammingController::class, 'deleteMyEventForce'])->name('deleteMyEventForce');

    Route::get('/', [TheoreticalProgrammingController::class, 'index'])->name('index');
    Route::post('/', [TheoreticalProgrammingController::class, 'store'])->name('store');
    Route::get('/create', [TheoreticalProgrammingController::class, 'create'])->name('create');
    Route::get('/{theoreticalProgramming}', [TheoreticalProgrammingController::class, 'show'])->name('show');
    Route::put('/{theoreticalProgramming}', [TheoreticalProgrammingController::class, 'update'])->name('update');
    Route::delete('/{theoreticalProgramming}', [TheoreticalProgrammingController::class, 'destroy'])->name('destroy');
    Route::get('/{theoreticalProgramming}/edit', [TheoreticalProgrammingController::class, 'edit'])->name('edit');
  });

  Route::prefix('unscheduled_programming')->name('unscheduled_programming.')->group(function(){
    Route::get('/', [UnscheduledProgrammingController::class, 'index'])->name('index');
    Route::post('/', [UnscheduledProgrammingController::class, 'store'])->name('store');
    Route::get('/create', [UnscheduledProgrammingController::class, 'create'])->name('create');
    Route::get('/{theoreticalProgramming}', [UnscheduledProgrammingController::class, 'show'])->name('show');
    Route::put('/{theoreticalProgramming}', [UnscheduledProgrammingController::class, 'update'])->name('update');
    Route::delete('/{theoreticalProgramming}', [UnscheduledProgrammingController::class, 'destroy'])->name('destroy');
    Route::get('/{theoreticalProgramming}/edit', [UnscheduledProgrammingController::class, 'edit'])->name('edit');
  });

  Route::prefix('calendar_programming')->name('calendar_programming.')->group(function(){
    Route::get('indexbox', [CalendarProgrammingController::class, 'indexbox'])->name('indexbox');
    Route::post('saveMyEvent', [CalendarProgrammingController::class, 'saveMyEvent'])->name('saveMyEvent');
    Route::post('updateMyEvent', [CalendarProgrammingController::class, 'updateMyEvent'])->name('updateMyEvent');
    Route::post('deleteMyEvent', [CalendarProgrammingController::class, 'deleteMyEvent'])->name('deleteMyEvent');
    Route::post('deleteMyEventForce', [CalendarProgrammingController::class, 'deleteMyEventForce'])->name('deleteMyEventForce');
    Route::post('programed_in_pavilions', [CalendarProgrammingController::class, 'programed_in_pavilions'])->name('programed_in_pavilions');

    Route::get('/', [CalendarProgrammingController::class, 'index'])->name('index');
    Route::post('/', [CalendarProgrammingController::class, 'store'])->name('store');
    Route::get('/create', [CalendarProgrammingController::class, 'create'])->name('create');
    Route::get('/{calendarProgramming}', [CalendarProgrammingController::class, 'show'])->name('show');
    Route::put('/{calendarProgramming}', [CalendarProgrammingController::class, 'update'])->name('update');
    Route::delete('/{calendarProgramming}', [CalendarProgrammingController::class, 'destroy'])->name('destroy');
    Route::get('/{calendarProgramming}/edit', [CalendarProgrammingController::class, 'edit'])->name('edit');
  });

  Route::prefix('operating_rooms')->name('operating_rooms.')->group(function(){
    Route::get('/', [OperatingRoomController::class, 'index'])->name('index');
    Route::post('/', [OperatingRoomController::class, 'store'])->name('store');
    Route::get('/create', [OperatingRoomController::class, 'create'])->name('create');
    Route::get('/{operatingRoom}', [OperatingRoomController::class, 'show'])->name('show');
    Route::put('/{operatingRoom}', [OperatingRoomController::class, 'update'])->name('update');
    Route::delete('/{operatingRoom}', [OperatingRoomController::class, 'destroy'])->name('destroy');
    Route::get('/{operatingRoom}/edit', [OperatingRoomController::class, 'edit'])->name('edit');
  });

  Route::prefix('mother_activities')->name('mother_activities.')->group(function(){
    Route::get('/', [MotherActivityController::class, 'index'])->name('index');
    Route::post('/', [MotherActivityController::class, 'store'])->name('store');
    Route::get('/create', [MotherActivityController::class, 'create'])->name('create');
    Route::get('/{motherActivity}', [MotherActivityController::class, 'show'])->name('show');
    Route::put('/{motherActivity}', [MotherActivityController::class, 'update'])->name('update');
    Route::delete('/{motherActivity}', [MotherActivityController::class, 'destroy'])->name('destroy');
    Route::get('/{motherActivity}/edit', [MotherActivityController::class, 'edit'])->name('edit');
  });

  Route::prefix('services')->name('services.')->group(function(){
    Route::get('/', [ServiceController::class, 'index'])->name('index');
    Route::post('/', [ServiceController::class, 'store'])->name('store');
    Route::get('/create', [ServiceController::class, 'create'])->name('create');
    Route::get('/{service}', [ServiceController::class, 'show'])->name('show');
    Route::put('/{service}', [ServiceController::class, 'update'])->name('update');
    Route::delete('/{service}', [ServiceController::class, 'destroy'])->name('destroy');
    Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('edit');
  });

  Route::prefix('specialties')->name('specialties.')->group(function(){
    Route::get('/', [SpecialtyController::class, 'index'])->name('index');
    Route::post('/', [SpecialtyController::class, 'store'])->name('store');
    Route::get('/create', [SpecialtyController::class, 'create'])->name('create');
    Route::get('/{specialty}', [SpecialtyController::class, 'show'])->name('show');
    Route::put('/{specialty}', [SpecialtyController::class, 'update'])->name('update');
    Route::delete('/{specialty}', [SpecialtyController::class, 'destroy'])->name('destroy');
    Route::get('/{specialty}/edit', [SpecialtyController::class, 'edit'])->name('edit');
  });

  Route::prefix('professions')->name('professions.')->group(function(){
    Route::get('/', [ProfessionController::class, 'index'])->name('index');
    Route::post('/', [ProfessionController::class, 'store'])->name('store');
    Route::get('/create', [ProfessionController::class, 'create'])->name('create');
    Route::get('/{profession}', [ProfessionController::class, 'show'])->name('show');
    Route::put('/{profession}', [ProfessionController::class, 'update'])->name('update');
    Route::delete('/{profession}', [ProfessionController::class, 'destroy'])->name('destroy');
    Route::get('/{profession}/edit', [ProfessionController::class, 'edit'])->name('edit');
  });

  Route::prefix('cutoffdates')->name('cutoffdates.')->group(function(){
    Route::get('consolidated_programming', [CutOffDateController::class, 'consolidated_programming'])->name('consolidated_programming');
    Route::get('savePerformance', [CutOffDateController::class, 'savePerformance'])->name('savePerformance');

    Route::get('/', [CutOffDateController::class, 'index'])->name('index');
    Route::post('/', [CutOffDateController::class, 'store'])->name('store');
    Route::get('/create', [CutOffDateController::class, 'create'])->name('create');
    Route::get('/{cutoffdate}', [CutOffDateController::class, 'show'])->name('show');
    Route::put('/{cutoffdate}', [CutOffDateController::class, 'update'])->name('update');
    Route::delete('/{cutoffdate}', [CutOffDateController::class, 'destroy'])->name('destroy');
    Route::get('/{cutoffdate}/edit', [CutOffDateController::class, 'edit'])->name('edit');
  });

  Route::prefix('clone')->name('clone.')->group(function(){
    Route::get('/', [CloneController::class, 'index'])->name('index');
    Route::post('/', [CloneController::class, 'store'])->name('store');
    Route::get('/create', [CloneController::class, 'create'])->name('create');
    Route::get('/{theoreticalProgramming}', [CloneController::class, 'show'])->name('show');
    Route::put('/{theoreticalProgramming}', [CloneController::class, 'update'])->name('update');
    Route::delete('/{theoreticalProgramming}', [CloneController::class, 'destroy'])->name('destroy');
    Route::get('/{theoreticalProgramming}/edit', [CloneController::class, 'edit'])->name('edit');
  });

  Route::prefix('reports')->name('reports.')->group(function(){
    Route::get('specialty', [OperatingRoomController::class, 'reportSpecialty'])->name('specialty');
    Route::get('by_profesional', [OperatingRoomController::class, 'reportByProfesional'])->name('by_profesional');
    Route::get('weekly', [OperatingRoomController::class, 'reportWeekly'])->name('weekly');
    Route::get('diary', [OperatingRoomController::class, 'reportDiary'])->name('diary');
    Route::get('report1', [OperatingRoomController::class, 'report1'])->name('report1');
    Route::get('reportProgramedVsTeoric', [OperatingRoomController::class, 'reportProgramedVsTeoric'])->name('reportProgramedVsTeoric');
    Route::get('urgency', [OperatingRoomController::class, 'reportUrgency'])->name('urgency');
    Route::get('reportminsal', [ReportController::class, 'export'])->name('reportminsal');
    Route::get('reportcut', [ReportController::class, 'exportcut'])->name('reportcut');
  });


});

Route::prefix('dummy')->name('dummy.')->group(function(){
    Route::view('/some', 'some')->name('some');
    Route::view('/crear_usuario', 'crear_usuario')->name('crear_usuario');
    Route::view('/traspaso_bloqueos', 'traspaso_bloqueos')->name('traspaso');
    Route::view('/agenda', 'agenda')->name('agenda');
<<<<<<< HEAD
=======
    Route::view('/lista-espera', 'lista_espera')->name('lista_espera');
});

Route::prefix('medical-licence')->name('medical_licence.')->group(function(){
  Route::get ('/create',[MedicalLicenceController::class,'create'])->name('create');
  Route::post ('/',[MedicalLicenceController::class,'store'])->name('store');


>>>>>>> eed03f33f8c8662cf59d48f11e0ce2dca75042d4
});
