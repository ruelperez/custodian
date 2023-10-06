<?php

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

Route::prefix('Dashboard')->middleware('auth')->group(function (){
    Route::get('/custodian', function (){
        return view('main');
    });
    Route::get('/data/{option}/{reports}', function ($option,$reports){
        return view('main', ['option' => $option, 'reports' => $reports]);
    });
    Route::post('/logout', [\App\Http\Controllers\UserController::class, 'logout']);
    Route::get('/request-pdf/{request}', [\App\Http\Controllers\RequestController::class, 'pdf']);
    Route::get('/request-pdf/pmr-report/{date}', [\App\Http\Controllers\PmrController::class, 'pdf']);
    Route::get('/request-pdf/wmr-form/{teacher}', [\App\Http\Controllers\WmrController::class, 'pdf']);
    Route::get('/form-inventory/{request}', [\App\Http\Controllers\InventoryController::class, 'pdf'])->name('form-inventory.pdf');
});

Route::get('/', function () {
    return view('login');
})->name('login')->middleware('guest');
Route::post('/login-process', [\App\Http\Controllers\UserController::class, 'login']);
Route::get('/register', [\App\Http\Controllers\UserController::class, 'store']);
