<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */

namespace App\AHK\Repositories\Company;

use App\AHK\Company;
use App\AHK\Repositories\DbRepository;

class DbCompanyRepository extends DbRepository implements CompanyRepository
{

	/**
	 * Paginate through all companies
	 * @return mixed
	 */
	public function all()
	{
		return Company::all();
	}
}