<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   11/12/2015
 */
namespace App\Ahk\Helpers;

/**
 * Class Utilities.
 */
class Utilities
{
    /**
     * @param $year
     *
     * @return bool|string
     */
    public function autoCopyright($year = "auto")
    {
        if (strcmp($year, "auto") === 0) {
            return date('Y');
        }

        if (intval($year) == date('Y')) {
            return $year;
        }

        if (intval($year) < date('Y')) {
            return "{$year} - ".date('Y');
        }

        return date('Y');
    }

    /**
     * @param array  $routes
     * @param string $activeClass
     * @param string $inactiveClass
     *
     * @return string
     */
    public function activate(array $routes, $activeClass = 'active', $inactiveClass = '')
    {
        return active_class(app('active')->checkRoute($routes), $activeClass, $inactiveClass);
    }
}

