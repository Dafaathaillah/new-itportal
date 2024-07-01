<?php

use App\Http\Controllers\KomputerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('komputer', KomputerController::class);
// Route::get('komputer_list', 'KomputerController@index');
