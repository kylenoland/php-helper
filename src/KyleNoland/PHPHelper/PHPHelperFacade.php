<?php namespace KyleNoland\PHPHelper;

use Illuminate\Support\Facades\Facade;

class PHPHelperFacade extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'PHPHelper';
	}
}
