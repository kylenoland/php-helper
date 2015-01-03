<?php namespace KyleNoland\PHPHelper;

use Illuminate\Support\ServiceProvider;

class PHPHelperServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('phphelper', function()
		{
			return new PHPHelper;
		});
	}

	/**
	 * Boot the service provider
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('kylenoland/phphelper');
	}

}
