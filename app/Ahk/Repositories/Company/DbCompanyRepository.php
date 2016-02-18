<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */

namespace App\Ahk\Repositories\Company;

use App\Ahk\Company;
use App\Ahk\Repositories\DbRepository;
use App\Ahk\User;

class DbCompanyRepository extends DbRepository implements CompanyRepository
{

	/**
	 * Paginate through all companies
	 * @param int $items
	 * @return mixed
	 */
	public function paginate($items = 10)
	{
		return Company::paginate($items);
	}

	/**
	 * Return all companies owned by given user, ready to be paginated
	 * @param User $user
	 * @return mixed
	 */
	public function getByUser(User $user)
	{
		return Company::where('user_id', $user->id);
	}
}