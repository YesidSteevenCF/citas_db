<?php

use App\Http\Controllers\Api\CitaController;
use Illuminate\Support\Facades\Route;

// Genera las 5 rutas REST del recurso citas
Route::apiResource('citas', CitaController::class);
