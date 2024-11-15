<?php

use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\InvApController;
use App\Http\Controllers\InvLaptopController;
use App\Http\Controllers\InvSwitchController;
use App\Http\Controllers\InvWirellessController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Foundation\Application;

Route::middleware('auth')->group(function () {

    // Route::inertia('/dashboard', 'Dashboard')->name('dashboard');

    Route::get('/redirectAuthenticatedUsers', [RedirectAuthenticatedUsersController::class, 'home']);

    Route::group(['middleware' => 'checkRole:ict_developer'], function () {
        Route::get('/developerDashboard', function () {
            return Inertia::render('Inventory/Dashboard');
        })->name('developerDashboard');
    });
    
    Route::group(['middleware' => 'checkRole:ict_section'], function () {
        Route::get('/sectionDashboard', function () {
            return Inertia::render('Inventory/DashboardSection');
        })->name('sectionDashboard');
    });

    Route::group(['middleware' => 'checkRole:ict_group_leader'], function () {
        Route::get('/groupLeaderDashboard', function () {
            return Inertia::render('Inventory/DashboardGroupLeader');
        })->name('groupLeaderDashboard');
    });

    Route::group(['middleware' => 'checkRole:ict_technician'], function () {
        Route::get('/technicianDashboard', function () {
            return Inertia::render('Inventory/DashboardTechnician');
        })->name('technicianDashboard');
    });

    Route::prefix('inventory')->group(function () {
        Route::get('/accessPoint', [InvApController::class, 'index'])->name('accessPoint.page');
        Route::get('/accessPoint/create', [InvApController::class, 'create'])->name('accessPoint.create');
        Route::post('/accessPoint/create', [InvApController::class, 'store'])->name('accessPoint.store');
        Route::get('/accessPoint/{apId}/edit', [InvApController::class, 'edit'])->name('accessPoint.edit');
        Route::put('/accessPoint/{apId}/update', [InvApController::class, 'update'])->name('accessPoint.update');
        Route::delete('/accessPoint/{apId}/delete', [InvApController::class, 'destroy'])->name('accessPoint.delete');
        Route::post('/uploadCsvAp', [InvApController::class, 'uploadCsv'])->name('accessPoint.import');

        Route::get('/switch', [InvSwitchController::class, 'index'])->name('switch.page');
        Route::get('/switch/create', [InvSwitchController::class, 'create'])->name('switch.create');
        Route::post('/switch/create', [InvSwitchController::class, 'store'])->name('switch.store');
        Route::get('/switch/{swId}/edit', [InvSwitchController::class, 'edit'])->name('switch.edit');
        Route::put('/switch/{swId}/update', [InvSwitchController::class, 'update'])->name('switch.update');
        Route::delete('/switch/{swId}/delete', [InvSwitchController::class, 'destroy'])->name('switch.delete');
        Route::post('/uploadCsvSw', [InvSwitchController::class, 'uploadCsv'])->name('switch.import');

        Route::get('/wirelless', [InvWirellessController::class, 'index'])->name('wirelless.page');
        Route::get('/wirelless/create', [InvWirellessController::class, 'create'])->name('wirelless.create');
        Route::post('/wirelless/create', [InvWirellessController::class, 'store'])->name('wirelless.store');
        Route::get('/wirelless/{id}/edit', [InvWirellessController::class, 'edit'])->name('wirelless.edit');
        Route::put('/wirelless/{id}/update', [InvWirellessController::class, 'update'])->name('wirelless.update');
        Route::delete('/wirelless/{id}/delete', [InvWirellessController::class, 'destroy'])->name('wirelless.delete');
        Route::post('/uploadCsvBb', [InvWirellessController::class, 'uploadCsv'])->name('wirelless.import');

        Route::get('/laptop', [InvLaptopController::class, 'index'])->name('laptop.page');
        Route::get('/laptop/create', [InvLaptopController::class, 'create'])->name('laptop.create');
        Route::post('/laptop/create', [InvLaptopController::class, 'store'])->name('laptop.store');
        Route::get('/laptop/{id}/edit', [InvLaptopController::class, 'edit'])->name('laptop.edit');
        Route::delete('/laptop/{id}/delete', [InvLaptopController::class, 'destroy'])->name('laptop.delete');
        Route::post('/laptop/update', [InvLaptopController::class, 'update'])->name('laptop.update');
        Route::get('/laptop/{id}/detail', [InvLaptopController::class, 'detail'])->name('laptop.detail');
        Route::post('/uploadCsvNb', [InvLaptopController::class, 'uploadCsv'])->name('laptop.import');
    });
});

require __DIR__ . '/auth.php';
