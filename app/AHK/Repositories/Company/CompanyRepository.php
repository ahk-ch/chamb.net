<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */

namespace App\AHK\Repositories\Company;

interface CompanyRepository
{

	/**
	 * Paginate through all companies
	 * @param int $items
	 * @return mixed
	 */
	public function paginate($items = 10);
}