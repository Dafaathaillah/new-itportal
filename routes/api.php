<?php

use App\Http\Controllers\ComputerLoanController;
use App\Http\Controllers\InvApController;
use App\Http\Controllers\InvCctvController;
use App\Http\Controllers\InvChannelRadioController;
use App\Http\Controllers\InvComputerController;
use App\Http\Controllers\InvGpsController;
use App\Http\Controllers\InvLaptopController;
use App\Http\Controllers\InvMobileTowerController;
use App\Http\Controllers\InvNvrController;
use App\Http\Controllers\InvPanelBoxController;
use App\Http\Controllers\InvPrinterController;
use App\Http\Controllers\InvRadioController;
use App\Http\Controllers\InvServerController;
use App\Http\Controllers\InvSwitchController;
use App\Http\Controllers\InvTowerController;
use App\Http\Controllers\InvWirellessController;
use App\Http\Controllers\KomputerController;
use App\Http\Controllers\LaptopLoanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('komputer_list', 'KomputerController@index');

Route::prefix('inventory')->group(function () {
    Route::apiResource('komputer', KomputerController::class);
    Route::apiResource('computer', InvComputerController::class);
    Route::apiResource('laptop', InvLaptopController::class);
    Route::apiResource('printer', InvPrinterController::class);
    Route::apiResource('access_point', InvApController::class);   
    Route::apiResource('switch', InvSwitchController::class);   
    Route::apiResource('wirelless', InvWirellessController::class);   
    Route::apiResource('nvr', InvNvrController::class);   
    Route::apiResource('cctv', InvCctvController::class);   
    Route::apiResource('mobile_tower', InvMobileTowerController::class);   
    Route::apiResource('tower_blc', InvTowerController::class);   
    Route::apiResource('panel_box', InvPanelBoxController::class);   
    Route::apiResource('gps', InvGpsController::class);   
    Route::apiResource('radio', InvRadioController::class);   
    Route::apiResource('channel_radio', InvChannelRadioController::class);   
    Route::apiResource('server', InvServerController::class);   
});

Route::prefix('peminjaman')->group(function () {
    Route::apiResource('komputer', ComputerLoanController::class);   
    Route::apiResource('laptop', LaptopLoanController::class);   
    Route::post('store_history_computer_loan', [ComputerLoanController::class, 'store_history_loan'])->name('api.storeLoanComputer');
    Route::get('get_data_history_computer_loan', [ComputerLoanController::class, 'get_history_loan'])->name('api.getHistoryData');
    Route::post('store_history_laptop_loan', [LaptopLoanController::class, 'store_history_loan'])->name('api.storeLoanLaptop');
    Route::get('get_data_history_laptop_loan', [LaptopLoanController::class, 'get_history_loan'])->name('api.getHistoryData');
});