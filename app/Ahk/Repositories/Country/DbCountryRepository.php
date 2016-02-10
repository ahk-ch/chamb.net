<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   10/2/2016
 */

namespace App\Ahk\Repositories\Country;

use App\Ahk\Country;
use App\Ahk\Repositories\DbRepository;
use Illuminate\Database\Eloquent\Collection;

class DbCountryRepository extends DbRepository implements CountryRepository
{

	/**
	 * Get all industry
	 * @return Collection
	 */
	public function all()
	{
		return Country::all();
	}
}