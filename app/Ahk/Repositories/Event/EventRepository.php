<?php

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since  09/03/16
 */
namespace App\Ahk\Repositories\Event;

use App\Ahk\Event;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface EventRepository.
 */
interface EventRepository
{
    /**
     * Return all events
     *
     * @return mixed
     */
    public function all();

    /**
     * Add files to event
     *
     * @param Event            $event
     * @param array|Collection $files
     *
     * @return Event|false
     */
    public function assignFiles(Event $event, $files);
}

