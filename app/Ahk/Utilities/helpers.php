<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @version 7/24/2015
 */

/**
 * @param array $routes
 * @param string $active
 * @return string
 */
function activate($routes = [], $active = 'active')
{
    return call_user_func_array('Route::is', $routes) ? $active : '';
}

