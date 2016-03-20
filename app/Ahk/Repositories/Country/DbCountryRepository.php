<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   10/2/2016
 */
namespace App\Ahk\Repositories\Country;

use App\Ahk\Country;
use App\Ahk\Repositories\DbRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class DbCountryRepository.
 */
class DbCountryRepository extends DbRepository implements CountryRepository
{
	/**
	 * DbCountryRepository constructor.
	 *
	 * @param Country $model
	 */
	public function __construct(Country $model = null)
	{
		$model = $model === null ? new Country : $model;

		parent::__construct($model);
	}

	/**
	 * Get all industry.
	 *
	 * @return Collection
	 */
	public function all()
	{
		return Country::all();
	}
}

