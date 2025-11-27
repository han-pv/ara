<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;

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

                Route::controller(UserController::class)
                    ->prefix('users')
                    ->name('users.')
                    ->group(function () {
                        Route::get('', 'index')->name('index');
                        Route::post('/{userId}/block', 'block')->name('block');
                    });

                Route::controller(PostController::class)
                    ->prefix('posts')
                    ->name('posts.')
                    ->group(function () {
                        Route::get('', 'index')->name('index');
                        Route::delete('/{postId}', 'destroy')->name('destroy');
                    });
            });
    });