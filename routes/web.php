<?php

use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('Dashboard')->middleware(['auth', 'isAdmin'])->group(function (){
    Route::get('/custodian', function (){
        return view('main',['month' => '01', 'mon' => 'January', 'item_type' => 'all']);
    });
    Route::get('/data/{option}/{reports}', function ($option,$reports){
        return view('main', ['option' => $option, 'reports' => $reports]);
    });
    Route::get('/pie-graph/{mos}/{mons}/{item_type}', function ($mos,$mons,$item_type){
        return view('main', ['month' => $mos, 'mon' => $mons, 'item_type' => $item_type]);
    });
    Route::get('/bar-graph/{mos}/{mons}/{item_type}', function ($mos,$mons,$item_type){
        return view('main', ['month' => $mos, 'mon' => $mons, 'item_type' => $item_type]);
    });
    Route::post('/logout', [\App\Http\Controllers\UserController::class, 'logout']);
    Route::get('/request-pdf/purchase/order', [\App\Http\Controllers\OrderController::class, 'pdf']);
    Route::get('/request-pdf/{request}', [\App\Http\Controllers\RequestController::class, 'pdf']);
    Route::get('/request-pdf/pmr-report/{date}', [\App\Http\Controllers\PmrController::class, 'pdf']);
    Route::get('/request-pdf/wmr-form/{teacher}', [\App\Http\Controllers\WmrController::class, 'pdf']);
    Route::get('/request-pdf/teacher-form/{teacher}', [\App\Http\Controllers\TeacherController::class, 'pdf']);
    Route::get('/request-pdf/ics-form/{icsNum}', [\App\Http\Controllers\IcsController::class, 'pdf']);
    Route::get('/request-pdf/stockcard-form/{item}', [\App\Http\Controllers\StockcardController::class, 'pdf']);
    Route::get('/request-pdf/request-form/{prNum}', [\App\Http\Controllers\RequestreportController::class, 'pdf']);
    Route::get('/request-pdf/order-form/{date}', [\App\Http\Controllers\OrderreportController::class, 'pdf']);
    Route::get('/request-pdf/pwmr-form/{name}/{date}', [\App\Http\Controllers\PwmrreportController::class, 'pdf']);
    Route::get('/request-pdf/deployed-report/{name}/{date}', [\App\Http\Controllers\DeployedreportController::class, 'pdf']);
    Route::get('/request-pdf/property-card/{itemName}', [\App\Http\Controllers\PropertyController::class, 'pdf']);
    Route::get('/request-pdf/component/{prop_id}', [\App\Http\Controllers\ComponentController::class, 'pdf']);
    Route::get('/request-pdf/par-report/{date}', [\App\Http\Controllers\ParController::class, 'pdf']);
    Route::get('/form-inventory/{request}', [\App\Http\Controllers\InventoryController::class, 'pdf'])->name('form-inventory.pdf');
    Route::get('/request-pdf/waste-summary/{date}', [\App\Http\Controllers\BackupwasteController::class, 'pdf']);
    Route::get('/export', [ExportController::class, 'export'])->name('export');

});

Route::get('/', function () {
    return view('login');
})->name('login')->middleware('guest');
Route::post('/login-process', [\App\Http\Controllers\UserController::class, 'login']);
Route::post('/register', [\App\Http\Controllers\UserController::class, 'store']);
