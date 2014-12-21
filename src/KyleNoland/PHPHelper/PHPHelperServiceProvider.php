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
		//
	}

	/**
	 * Boot the service provider
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('KyleNoland/PHPHelper');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
