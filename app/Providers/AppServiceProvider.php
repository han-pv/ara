<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('client.partials.sidebar', function ($view) {
            $user = User::where('id', Auth::user()->id)
                ->withCount('posts', 'followers', 'following')
                ->first();
            $view->with('user', $user);
        });
    }
}
