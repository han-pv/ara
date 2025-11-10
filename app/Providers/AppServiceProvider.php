<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Profile;
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
        //Eger sidebar-da user profile gorunmeli bolsa

        // View::composer('client.partials.sidebar', function ($view) {
        //     $user = User::where('id', Auth::user()->id)
        //         ->withCount('posts', 'followers', 'following')
        //         ->first();
        //     $view->with('user', $user);
        // });
        View::composer('client.partials.nav', function ($view) {
            $profile = Profile::where('user_id', Auth::id())
                ->select('avatar')
                ->first();
            $view->with('profile', $profile);
        });
        View::composer('client.partials.post-card', function ($view) {
            $profile = Profile::where('user_id', Auth::id())
                ->select('avatar')
                ->first();
            $view->with('profile', $profile);
        });
    }
}
