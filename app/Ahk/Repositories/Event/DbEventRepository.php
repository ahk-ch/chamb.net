<?php namespace App\Ahk\Repositories\Event;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 09/03/16
 */

use App\Ahk\Event;
use App\Ahk\Repositories\DbRepository;
use Illuminate\Database\Eloquent\Collection;

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

	/**
	 * Add files to event
	 *
	 * @param Event $event
	 * @param array|Collection $files
	 * @return Event|false
	 */
	public function assignFiles(Event $event, $files)
	{
		$event->files()->saveMany($files);

		return $event->save() ? $event : false;
	}
}