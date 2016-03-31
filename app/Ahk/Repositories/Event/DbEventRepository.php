<?php

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since  09/03/16
 */
namespace App\Ahk\Repositories\Event;

use App\Ahk\Event;
use App\Ahk\Repositories\DbRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class DbEventRepository.
 */
class DbEventRepository extends DbRepository implements EventRepository
{
    /**
     * DbEventRepository constructor.
     *
     * @param Event $model
     */
    public function __construct(Event $model = null)
    {
        $model = $model === null ? new Event : $model;

        parent::__construct($model);
    }

    /**
     * Return all events.
     *
     * @return mixed
     */
    public function all()
    {
        return Event::all();
    }

    /**
     * Add files to event.
     *
     * @param Event            $event
     * @param array|Collection $files
     *
     * @return Event|false
     */
    public function assignFiles(Event $event, $files)
    {
        $event->files()->saveMany($files);

        return $event->save() ? $event : false;
    }
}
