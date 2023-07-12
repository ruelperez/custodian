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
    Route::get('/{option}', function ($option){
        return view('main', ['option' => $option]);
    });
    Route::post('/logout', [\App\Http\Controllers\UserController::class, 'logout']);
    Route::get('/form-request/{request}', [\App\Http\Controllers\RequestController::class, 'pdf'])->name('form-request.pdf');
    Route::get('/form-order/{request}', [\App\Http\Controllers\OrderController::class, 'pdf'])->name('form-order.pdf');
    Route::get('/form-inventory/{request}', [\App\Http\Controllers\InventoryController::class, 'pdf'])->name('form-inventory.pdf');
});

Route::get('/', function () {
    return view('login');
})->name('login')->middleware('guest');
Route::post('/login-process', [\App\Http\Controllers\UserController::class, 'login']);
Route::get('/register', [\App\Http\Controllers\UserController::class, 'store']);
