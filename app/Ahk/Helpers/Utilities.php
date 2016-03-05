<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   11/12/2015
 */

namespace App\Ahk\Helpers;


/**
 * Class Utilities
 * @package App\Ahk\Helpers
 */
class Utilities
{

    /**
     * @param $year
     * @return bool|string
     */
    public function autoCopyright($year = "auto")
    {
        if (strcmp($year, "auto") === 0) return date('Y');

        if (intval($year) == date('Y')) return $year;

        if (intval($year) < date('Y')) return "{$year} - " . date('Y');

        return date('Y');
    }

	/**
     * @param array $routes
     * @param string $active
     * @return string
     */
    public function activate(array $routes, $active = 'active')
    {
        return call_user_func_array('Route::is', $routes) ? $active : '';
    }
}
