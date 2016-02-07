<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   11/12/2015
 */

namespace App\Ahk\Helpers;


class Helpers {

	/**
	 * @param $year
	 * @return bool|string
	 */
	public static function autoCopyright($year = "auto")
	{
		if ( strcmp($year, "auto") === 0 ) return date('Y');

		if ( intval($year) == date('Y') ) return $year;

		if ( intval($year) < date('Y') ) return "{$year} - " . date('Y');

		return date('Y');
	}
}