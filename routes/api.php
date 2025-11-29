<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;

// API Routes
// !!! Barde hokman auth goymaly. Hazirlikce acyk api !!!
// (Auth:sanctum) goymaly

// api/v1/posts
Route::prefix('v1')->group(function () {
    Route::get('/posts', [PostController::class, 'index']);
});
