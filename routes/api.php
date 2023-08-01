<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;

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
    Route::put('{id}', [UserController::class, 'update']);
    Route::delete('{id}', [UserController::class, 'destroy']);
});

Route::prefix('cidades')->group(function () {
    Route::get('', [CityController::class, 'index']);
    Route::get('{id_cidade}/medicos', [DoctorController::class, 'getDoctorsByCity']);
});

Route::middleware('jwt')->prefix('medicos')->group(function () {
    Route::get('', [DoctorController::class, 'index'])->withoutMiddleware('jwt');
    Route::post('', [DoctorController::class, 'store']);
    Route::get('{id_medico}/pacientes', [DoctorController::class, 'getPatientsByDoctor']);
    Route::post('{id_medico}/pacientes', [DoctorController::class, 'linkDoctorWithPatient']);
});

Route::middleware('jwt')->prefix('pacientes')->group(function () {
    Route::get('', [PatientController::class, 'index']);
    Route::post('', [PatientController::class, 'store']);
    Route::put('{id_paciente}', [PatientController::class, 'update']);
});