<?php

use App\Http\Controllers\KomputerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('index/index');
});

Route::apiResource('komputer', KomputerController::class);
// Route::get('komputer_list', 'KomputerController@index');
