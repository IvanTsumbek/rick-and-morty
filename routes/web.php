<?php

use App\Http\Controllers\Location\LocationIndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')->group(function () {
    Route::get('/location/{id}', [LocationIndexController::class, 'index']);
    Route::get('/location', [LocationIndexController::class, 'indexAll']);
});