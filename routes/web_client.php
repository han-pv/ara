<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\LikeController;
use App\Http\Controllers\Client\PostController;
use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\Client\LoginController;
use App\Http\Controllers\Client\FollowController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\RegisterController;

Route::get('/',  [HomeController::class, 'index'])->name('home');

Route::get('locale/{locale}', [HomeController::class, 'locale'])->name('locale')->where('locale', '[a-z]+');

Route::middleware('guest')
    ->middleware('throttle:60,1')
    ->group(function () {
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store']);

        Route::get('register', [RegisterController::class, 'create'])->name('register');
        Route::post('register', [RegisterController::class, 'store']);
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
                Route::get('/{id}/like', 'like')->name('like')->where('id', '[0-9]+');
            });

        Route::controller(ProfileController::class)
        ->prefix('profile')
        ->name('profile.')
        ->group(function() {
            Route::get('', 'show')->name('show');
        });

        Route::post('/like/{postId}', [LikeController::class, 'toggle'])->name('post.like');
        Route::post('/follow/{userId}', [FollowController::class, 'toggle'])->name('follow');

        Route::controller(UserController::class)
            ->prefix('users')
            ->name('users.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/{id}', 'show')->name('show')->where('id', '[0-9]+');
            });
    });