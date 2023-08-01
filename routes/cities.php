<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DoctorController;

/*
|--------------------------------------------------------------------------
| Cities Routes
|--------------------------------------------------------------------------
*/

Route::prefix('cidades')->group(function () {
    Route::get('', [CityController::class, 'index']);
    Route::get('{id_cidade}/medicos', [DoctorController::class, 'getDoctorsByCity']);
});