<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */

namespace App\Ahk\Repositories\Company;

use App\Ahk\User;

interface CompanyRepository
{

	/**
	 * Paginate through all companies
	 * @param int $items
	 * @return mixed
	 */
	public function paginate($items = 10);

	/**
	 * Return all companies owned by given user, ready to be paginated
	 * @param User $user
	 * @return mixed
	 */
	public function getByUser(User $user);
}