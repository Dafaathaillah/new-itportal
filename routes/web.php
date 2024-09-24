<?php

use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
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
});

require __DIR__ . '/auth.php';
