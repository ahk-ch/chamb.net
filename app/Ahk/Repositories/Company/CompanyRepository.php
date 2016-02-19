<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */

namespace App\Ahk\Repositories\Company;

use App\Ahk\Company;
use App\Ahk\User;
use Symfony\Component\HttpFoundation\Tests\File\FakeFile;

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

	/**
	 * Update company
	 * 
	 * @param Company $company
	 * @param $data
	 * @return Company|false
	 */
	public function update(Company $company, array $data);

	/**
	 * Update company primary data
	 *
	 * @param Company $company
	 * @param $data
	 * @return Company|false
	 */
	public function updatePrimaryData(Company $company, array $data);

	/**
	 * Update company logo
	 *
	 * @param Company $company
	 * @param $tempLogoPath
	 * @param null $storageLocation
	 * @return Company|false
	 */
	public function updateLogo(Company $company, $tempLogoPath, $storageLocation = null);
}