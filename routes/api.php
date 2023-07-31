<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DoctorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('jwt')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login')->withoutMiddleware('jwt');
    Route::get('/user', [AuthController::class, 'me'])->name('me');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('jwt')->prefix('users')->group(function () {
    Route::get('', [UserController::class, 'index']);
    Route::get('{id}', [UserController::class, 'show']);
    Route::post('store', [UserController::class, 'store'])->withoutMiddleware('jwt');
    Route::post('{id}', [UserController::class, 'update']);
    Route::delete('{id}', [UserController::class, 'destroy']);
});

Route::prefix('cidades')->group(function () {
    Route::get('', [CityController::class, 'index']);
    Route::get('{id}/medicos', [DoctorController::class, 'showByCity']);
});

Route::prefix('medicos')->group(function () {
    Route::get('', [DoctorController::class, 'index']);
    Route::post('', [DoctorController::class, 'store']);
});

