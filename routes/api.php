<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Episode\EpisodeController;
use App\Http\Controllers\Location\LocationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/location', [LocationController::class, 'index']);
Route::get('/location/{id}', [LocationController::class, 'show']);

Route::get('/episode', [EpisodeController::class, 'index']);
Route::get('/episode/{id}', [EpisodeController::class, 'show']);