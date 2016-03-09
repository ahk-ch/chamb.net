<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */

namespace App\Ahk\Repositories\Company;

use App\Ahk\Company;
use App\Ahk\User;
use Illuminate\Database\Eloquent\Collection;

interface CompanyRepository
{

	/**
	 * Paginate through all companies
	 * @param int $items
	 * @return mixed
	 */
	public function paginate($items = 10);

	/**
	 * Return all companies
	 * @return mixed
	 */
	public function all();

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
	 * Store company
	 *
	 * @param User $user
	 * @param array $data
	 * @return Company|false
	 */
	public function store(User $user, array $data);

	/**
	 * Assign company representative user
	 *
	 * @param Company $company
	 * @param User $user
	 * @return Company|false
	 */
	public function assignRepresentativeUser(Company $company, User $user);

	/**
	 * Update the industry of a company
	 *
	 * @param Company $company
	 * @param $industryId
	 * @return Company|false
	 */
	public function assignIndustryById(Company $company, $industryId);

	/**
	 * Update the country of a company
	 *
	 * @param Company $company
	 * @param $countryId
	 * @return Company|false
	 */
	public function assignCountryById(Company $company, $countryId);

	/**
	 * Update the logo of a company
	 *
	 * @param Company $company
	 * @param $logoId
	 * @return Company|false
	 */
	public function assignLogoById(Company $company, $logoId);

	/**
	 * Add files to company
	 *
	 * @param Company $company
	 * @param array|Collection $files
	 * @return Company|false
	 */
	public function assignFiles(Company $company, $files);
}

