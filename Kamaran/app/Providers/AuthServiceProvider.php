<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin||manager', function($user){
            return $user->level == 'admin' || $user->level == 'manager';
        });
        Gate::define('admin', function($user){
            return $user->level == 'admin';
        });
        Gate::define('manager', function($user){
            return $user->level == 'manager';
        });
        Gate::define('employee', function($user){
            return $user->level == 'employee';
        });
        Gate::define('inventory', function($user){
            return $user->level == 'inventory_employee';
        });
        Gate::define('supplier', function($user){
            return $user->level == 'head_of_suppliers';
        });
    }
}
