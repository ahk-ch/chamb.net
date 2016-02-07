<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace App\Ahk\Notifications;

use Illuminate\Support\Facades\Facade;

class Flash extends Facade {

	protected static function getFacadeAccessor()
	{
		return 'flash';
	}
}