<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/2/2016
 */

namespace App\Ahk\Repositories\Service;

use App\Ahk\Repositories\DbRepository;
use App\Ahk\Service;
use Illuminate\Support\Collection;

class DbServiceRepository extends DbRepository implements ServiceRepository
{

	/**
	 * Get all services
	 * @return Collection
	 */
	public function all()
	{
		return Service::all();
	}
}