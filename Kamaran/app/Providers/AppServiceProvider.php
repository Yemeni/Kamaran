<?php

namespace App\Providers;

use App\Alerts\AlertByBTA;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */

	public function boot()
	{
		Schema::defaultStringLength(191);

		Blade::directive('alert', function ($type) {
			switch ($type)
			{
				case 'BTA':
					return "<?php echo \App\Alerts\AlertByBTA::render(); ?>";
					break;
				default:
					return "<?php echo \App\Alerts\AlertByBTA::render(); ?>";
					break;
			}
		});

	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}
}
