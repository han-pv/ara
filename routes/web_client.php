<?php

use App\Http\Controllers\Client\PostController;
use App\Http\Controllers\Client\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')
    ->group(function () {
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store']);
    });


Route::middleware('auth')
    ->group(function () {
        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    });

Route::middleware('auth')
    ->group(function () {
        Route::controller(PostController::class)
            ->prefix('posts')
            ->name('posts.')
            ->group(function () {
                Route::get('create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
                Route::put('{id}', 'update')->name('update')->where('id', '[0-9]+');
                Route::delete('{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');

                Route::get('', 'index')->name('index');
                Route::get('/{id}', 'show')->name('show')->where('id', '[0-9]+');
            });
    });