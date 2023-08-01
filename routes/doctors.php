<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;

/*
|--------------------------------------------------------------------------
| Doctor Routes
|--------------------------------------------------------------------------
|
*/

Route::prefix('medicos')->group(function () {
    Route::get('', [DoctorController::class, 'index']);

    Route::middleware('jwt')->group(function () {
        Route::get('{id_medico}/pacientes', [DoctorController::class, 'getPatientsByDoctor']);
        Route::post('{id_medico}/pacientes', [DoctorController::class, 'linkDoctorWithPatient']);
        Route::post('', [DoctorController::class, 'store']);
    });
});