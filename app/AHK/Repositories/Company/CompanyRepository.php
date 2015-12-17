<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */

namespace app\AHK\Repositories\Company;

interface CompanyRepository
{

	/**
	 * Paginate through all companies
	 * @return mixed
	 */
	public function all();
}