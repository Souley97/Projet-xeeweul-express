<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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
        Gate::define('all-users', function ($user) {
            return $user->hasAllRole(['SuperAdmin', 'Admin', 'User']);
        });
        Gate::define('manage-users', function ($user) {
            return $user->hasAnyRole(['SuperAdmin', 'Admin']);
        });
        Gate::define('admins', function ($user) {
            return $user->hasAdminRole(['Admin']);
        });


        // Gate::define('junior-users', function ($user){
        //     return $user->hasAnyRole('Junior');
        //     });
        Gate::define('users', function ($user) {
            return $user->isUser(['User']);
        });
        //
    }
}
