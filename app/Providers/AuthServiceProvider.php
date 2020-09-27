<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Post' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // define admin user role
        Gate::define('isAdmin', function($user){
            return $user->role == 'admin';
        });

        // define manager user role
        Gate::define('isManager', function($user){
            return $user->role == 'manager';
        });

        // define user role
        Gate::define('isUser', function($user){
            return $user->role == 'user';
        });
    }
}
