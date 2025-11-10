<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::middleware('guest')
            ->middleware('throttle:60,1')
            ->group(function () {
                Route::get('login', [LoginController::class, 'create'])->name('login');
                Route::post('login', [LoginController::class, 'store']);
            });

        Route::middleware('auth:admin')
            ->group(function () {
                Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
            });

        Route::middleware('auth:admin')
            ->group(function () {
                Route::get('', [DashboardController::class, 'index'])->name('dashboard.index');

                Route::controller(UserController::class)->group(function () {
                    Route::get('users', 'index')->name('users.index');
                    Route::get('users/{userId}', 'show')->name('users.show');
                    Route::post('users/{userId}/block', 'block')->name('users.block');
                });
            });
    });