<?php

namespace App\Providers;

use App\Category;
use App\Order;
use App\Policies\CategoryPolicy;
use App\Policies\OrderPolicy;
use App\Policies\ShipmentPolicy;
use App\Shipment;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider {

	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
		'App\User'      => 'App\Policies\UserPolicy',
		Category::class => CategoryPolicy::class,
		Order::class    => OrderPolicy::class,
		Shipment::class => ShipmentPolicy::class
	];

	/**
	 * Register any authentication / authorization services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerPolicies();

		Gate::resource('category', 'App\Policies\CategoryPolicy');

		Gate::define('admin||manager', function ($user) {
			return $user->level == 'admin' || $user->level == 'manager';
		});
		Gate::define('manager||employee', function ($user) {
			return $user->level == 'employee' || $user->level == 'manager';
		});
		Gate::define('admin||manager||employee', function ($user) {
			return $user->level == 'admin' || $user->level == 'employee' || $user->level == 'manager';
		});
		Gate::define('admin', function ($user) {
			return $user->level == 'admin';
		});
		Gate::define('manager', function ($user) {
			return $user->level == 'manager';
		});
		Gate::define('employee', function ($user) {
			return $user->level == 'employee';
		});
		Gate::define('admin||inventory', function ($user) {
			return $user->level == 'inventory_employee' || $user->level == 'admin';
		});
        Gate::define('admin||manager||employee||inventory', function ($user) {
            return $user->level == 'admin' || $user->level == 'employee' || $user->level == 'manager' || $user->level == 'inventory_employee';
        });
		Gate::define('admin||supplier', function ($user) {
			return $user->level == 'head_of_suppliers' || $user->level == 'admin';
		});
		Gate::define('inventory', function ($user) {
			return $user->level == 'inventory_employee';
		});
		Gate::define('supplier', function ($user) {
			return $user->level == 'head_of_suppliers';
		});
	}
}
