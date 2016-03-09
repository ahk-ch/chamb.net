<?php namespace App\Ahk\Repositories\Event;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 09/03/16
 */

use App\Ahk\Event;
use App\Ahk\Repositories\DbRepository;

/**
 * Class DbEventRepository
 * @package App\Ahk\Repositories
 */
class DbEventRepository extends DbRepository implements EventRepository
{

	/**
	 * Return all events
	 * @return mixed
	 */
	public function all()
	{
		return Event::all();
	}
}