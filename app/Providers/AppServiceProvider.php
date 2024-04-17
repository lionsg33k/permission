<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Blade;
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
        # define custom directive @checkRole()
        Blade::directive('checkRole', function (string $role) {
            return "<?php if (Auth::check() && Auth::user()->hasRole($role)) : ?>";
            });
            
        # define custom directive @endCheckRole
        Blade::directive('endCheckRole', function () {
            return "<?php endif ; ?>";
        });

        # define gate (permission) product
        Gate::define('product', function (User $user) {
            return in_array($user->role, ['admin', 'seller', 'editor']);
            // return $user->role == 'admin' || $user->role == 'seller';
        });
    }
}
