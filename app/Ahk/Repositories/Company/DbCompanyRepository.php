<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */

namespace App\Ahk\Repositories\Company;

use App\Ahk\Company;
use App\Ahk\Repositories\DbRepository;
use App\Ahk\Storage\CompaniesStorage;
use App\Ahk\User;
use Illuminate\Support\Facades\Storage;

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

	/**
	 * Update company
	 *
	 * @param Company $company
	 * @param $data
	 * @return Company|false
	 */
	public function update(Company $company, array $data)
	{
		$company = $this->updatePrimaryData($company, $data);

		$company = $this->updateLogo($company, $data['logo']);

		return $company;
	}

	/**
	 * Update company primary data
	 *
	 * @param Company $company
	 * @param $data
	 * @return Company|false
	 */
	public function updatePrimaryData(Company $company, array $data)
	{
		return $company->fill($data)->save() ? $company : false;
	}

	/**
	 * Update company logo
	 *
	 * @param Company $company
	 * @param $newLogoPath
	 * @param null $storageLocation
	 * @return Company|false
	 */
	public function updateLogo(Company $company, $newLogoPath, $storageLocation = null)
	{
		$storageLocation === null ?
			CompaniesStorage::getAhkStorageDirectoryByCompanyId($company->id) : $storageLocation;
		
		$logoLocation = $storageLocation . "logo.png";

		Storage::put($logoLocation, Storage::get($newLogoPath));

		$company->logo = $logoLocation;

		return $company->save() ? $company : false;
	}
}