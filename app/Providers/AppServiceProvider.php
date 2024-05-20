<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\PersonalAccessToken;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\Sanctum;

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
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);

        Gate::define('admin', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('user', function ($user, $userId) {
            return $user->id === $userId || $user->role === 'admin';
        });
    }
}
