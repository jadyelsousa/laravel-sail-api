<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

/*
|--------------------------------------------------------------------------
| Patients Routes
|--------------------------------------------------------------------------
|
*/

Route::middleware('jwt')->prefix('pacientes')->group(function () {
    Route::get('', [PatientController::class, 'index']);
    Route::post('', [PatientController::class, 'store']);
    Route::put('{id_paciente}', [PatientController::class, 'update']);
});