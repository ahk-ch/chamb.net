<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace App\Ahk\Notifications;

use Illuminate\Support\Facades\Facade;

/**
 * Class Flash.
 */
class Flash extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'flash';
    }
}

