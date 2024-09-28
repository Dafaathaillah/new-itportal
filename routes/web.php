<?php

use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\InvApController;
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
        Route::get('/accessPoint', [InvApController::class, 'index'])
        ->name('accessPoint.page');
        
        Route::get('/accessPoint/create', [InvApController::class, 'create'])
        ->name('accessPoint.create');

        Route::post('/accessPoint/create', [InvApController::class, 'store'])
        ->name('accessPoint.store');

        Route::get('/accessPoint/{apId}/edit', [InvApController::class, 'edit'])
        ->name('accessPoint.edit');

        Route::put('/accessPoint/{apId}/update', [InvApController::class, 'update'])
        ->name('accessPoint.update');

        Route::delete('/accessPoint/{apId}/delete', [InvApController::class, 'destroy'])
        ->name('accessPoint.delete');
    });
});

require __DIR__ . '/auth.php';
