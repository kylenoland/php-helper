<?php namespace KyleNoland\LaravelHelper;

use DateInterval;
use DateTime;

class Helper
{
	/**
	 * Format and dump data then die
	 *
	 * @param $data
	 */
	public static function pp($data)
	{
		static::pretty($data);
		die;
	}


	/**
	 * Format and dump data
	 *
	 * @param $data
	 */
	public static function pretty($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}


	/**
	 * Get the API prefix for use in JS files
	 *
	 * @param string $version
	 *
	 * @return string
	 */
	public static function getApiPrefix($version = 'v1')
	{
		return '/api/' . $version;
	}


	/**
	 * Get REMOTE_ADDR attribute of the user agent
	 *
	 * @return string
	 */
	public static function getRemoteAddress()
	{
		return $_SERVER['REMOTE_ADDR'];
	}


	/**
	 * Calculate the number of week days between two arbitrary dates
	 *
	 * @param DateTime $start
	 * @param DateTime $end
	 *
	 * @return int
	 */
	public static function weekdaysBetween(DateTime $start, DateTime $end = null)
	{
		if(is_null($end))
		{
			$end = new DateTime(); // Today
		}

		$days  = 0;

		// Count the number of weekdays between $start and $end
		while($start->diff($end)->d > 0)
		{
			$days += $start->format('N') < 6 ? 1 : 0;
			$start = $start->add(new DateInterval('P1D'));
		}

		return $days;
	}


	/**
	 * Determine if $num is a decimal value
	 *
	 * @param $num
	 *
	 * @return bool
	 */
	public static function isDecimal($num)
	{
		return is_numeric($num) and (floor($num) != $num);
	}


	/**
	 * Remove trailing zeros from a decimal number
	 *
	 * @param $decimal
	 *
	 * @return mixed
	 */
	public static function stripTrailingZeros($decimal)
	{
		return $decimal + 0;
	}


	/**
	 * Format a US phone number
	 *
	 * @param $num
	 *
	 * @return string
	 */
	public static function format_phone($num)
	{
		$num = static::stripNonNumeric($num);

		// 1 (800) 555-5555
		if(strlen($num) == 11)
		{
			return substr($num, 0, 1).' ('.substr($num, 1, 3).') '.substr($num, 4, 3).'-'.substr($num, 7);
		}

		// (555) 555-5555
		else if(strlen($num) == 10)
		{
			return '('.substr($num, 0, 3).') '.substr($num, 3, 3).'-'.substr($num, 6);
		}
	}


	/**
	 * Strip non numeric characters from the string
	 *
	 * @param $str
	 *
	 * @return mixed
	 */
	public static function stripNonNumeric($str)
	{
		return preg_replace('(\D+)', '', $str);
	}


	/**
	 * Format a date string
	 *
	 * @param string $date
	 * @param string $format
	 *
	 * @return bool|string
	 */
	public static function formatDate($date, $format = 'm/d/Y')
	{
		return date($format, strtotime($date));
	}


	/**
	 * Format a time string
	 *
	 * @param string $time
	 * @param string $format
	 *
	 * @return bool|string
	 */
	public static function formatTime($time, $format = 'h:i A')
	{
		return date($format, strtotime($time));
	}


	/**
	 * Convert dollars to cents
	 *
	 * @param $dollars
	 *
	 * @return mixed
	 */
	public static function dollarsToCents($dollars)
	{
		// Strip everything but numbers, the - and . characters
		$amount = preg_replace("/[^0-9\.\-]/", "", $dollars);

		return $amount * 100;
	}


	/**
	 * Get an array of US states and their abbreviations
	 *
	 * @return array
	 */
	function getUsStates()
	{
		return $states = array(
			'AL' => 'Alabama',
			'AK' => 'Alaska',
			'AZ' => 'Arizona',
			'AR' => 'Arkansas',
			'CA' => 'California',
			'CO' => 'Colorado',
			'CT' => 'Connecticut',
			'DE' => 'Delaware',
			'DC' => 'District of Columbia',
			'FL' => 'Florida',
			'GA' => 'Georgia',
			'HI' => 'Hawaii',
			'ID' => 'Idaho',
			'IL' => 'Illinois',
			'IN' => 'Indiana',
			'IA' => 'Iowa',
			'KS' => 'Kansas',
			'KY' => 'Kentucky',
			'LA' => 'Louisiana',
			'ME' => 'Maine',
			'MD' => 'Maryland',
			'MA' => 'Massachusetts',
			'MI' => 'Michigan',
			'MN' => 'Minnesota',
			'MS' => 'Mississippi',
			'MO' => 'Missouri',
			'MT' => 'Montana',
			'NE' => 'Nebraska',
			'NV' => 'Nevada',
			'NH' => 'New Hampshire',
			'NJ' => 'New Jersey',
			'NM' => 'New Mexico',
			'NY' => 'New York',
			'NC' => 'North Carolina',
			'ND' => 'North Dakota',
			'OH' => 'Ohio',
			'OK' => 'Oklahoma',
			'OR' => 'Oregon',
			'PA' => 'Pennsylvania',
			'RI' => 'Rhode Island',
			'SC' => 'South Carolina',
			'SD' => 'South Dakota',
			'TN' => 'Tennessee',
			'TX' => 'Texas',
			'UT' => 'Utah',
			'VT' => 'Vermont',
			'VA' => 'Virginia',
			'WA' => 'Washington',
			'WV' => 'West Virginia',
			'WI' => 'Wisconsin',
			'WY' => 'Wyoming'
		);
	}
}