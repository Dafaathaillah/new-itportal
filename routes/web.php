<?php

use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Foundation\Application;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/developerDashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('developerDashboard');

//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// })->middleware('checkRole:ict_developer');

// Route::middleware('auth')->group(function () {
//     Route::get('/groupLeaderDashboard', function () {
//         return Inertia::render('DashboardGroupLeader');
//     })->name('dashboard')->middleware('checkRole:ict_group_leader');

//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// })->middleware('checkRole:ict_group_leader');


// =======================================
Route::middleware('auth')->group(function () {

    // Route::inertia('/dashboard', 'Dashboard')->name('dashboard');

    Route::get('/redirectAuthenticatedUsers', [RedirectAuthenticatedUsersController::class, 'home']);

    Route::group(['middleware' => 'checkRole:ict_developer'], function () {
        Route::get('/developerDashboard', function () {
            return Inertia::render('Dashboard');
        })->name('developerDashboard');
    });
    
    Route::group(['middleware' => 'checkRole:ict_section'], function () {
        Route::get('/sectionDashboard', function () {
            return Inertia::render('DashboardSection');
        })->name('sectionDashboard');
    });

    Route::group(['middleware' => 'checkRole:ict_group_leader'], function () {
        Route::get('/groupLeaderDashboard', function () {
            return Inertia::render('DashboardGroupLeader');
        })->name('groupLeaderDashboard');
    });

    Route::group(['middleware' => 'checkRole:ict_technician'], function () {
        Route::get('/technicianDashboard', function () {
            return Inertia::render('DashboardTechnician');
        })->name('technicianDashboard');
    });
});

//  =======================================

require __DIR__ . '/auth.php';
