<?php

use App\Http\Controllers\InvApController;
use App\Http\Controllers\InvSwitchController;
use App\Http\Controllers\InvWirellessController;
use App\Http\Controllers\KomputerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('komputer_list', 'KomputerController@index');

Route::prefix('inventory')->group(function () {
    Route::apiResource('komputer', KomputerController::class);
    Route::apiResource('access_point', InvApController::class);   
    Route::apiResource('switch', InvSwitchController::class);   
    Route::apiResource('wirelless', InvWirellessController::class);   
});