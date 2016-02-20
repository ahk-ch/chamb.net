<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */

namespace App\Ahk\Repositories\Company;

use App\Ahk\Company;
use App\Ahk\Country;
use App\Ahk\Industry;
use App\Ahk\Notifications\Flash;
use App\Ahk\Repositories\DbRepository;
use App\Ahk\Storage\CompaniesStorage;
use App\Ahk\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

		$company = $this->updateIndustryByIndustryId($company, $data['industry_id']);

		$company = $this->updateCountryByCountryId($company, $data['country_id']);

		return $company->save() ? $company : false;
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
		$data['slug'] = Str::slug($data['name']);

		$company->fill(array_only($data,
			['name', 'description', 'focus', 'business_leader', 'address', 'email', 'phone_number', 'slug']
		));

		return $company;
	}

	/**
	 * Update the industry of a company
	 *
	 * @param Company $company
	 * @param Industry $industryId
	 * @return Company|false
	 */
	public function updateIndustryByIndustryId(Company $company, $industryId)
	{
		$industry = Industry::find($industryId);

		$company->industry()->associate($industry);

		return $company->save() ? $company : false;
	}

	/**
	 * Update company logo
	 *
	 * @param Company $company
	 * @param $tempLogoPath
	 * @param null $storageLocation
	 * @return Company|false
	 */
	public function updateLogo(Company $company, $tempLogoPath, $storageLocation = null)
	{
		$storageLocation = $storageLocation === null ?
			CompaniesStorage::getAhkStorageDirectoryByCompanySlug($company->slug)
			: $storageLocation;

		$logoLocation = $storageLocation . "logo.png";

		if ( ! File::exists($storageLocation) ) Storage::makeDirectory($storageLocation);

		if ( Storage::exists($logoLocation) ) Storage::delete($logoLocation);

		Storage::put($logoLocation, file_get_contents($tempLogoPath));

		$company->logo = $logoLocation;

		if ( ! $company->save() )
		{
			Flash::error(trans('ahk_messages.unable_to_update_logo'));

			return false;
		}

		return $company;
	}

	/**
	 * Store company
	 *
	 * @param User $user
	 * @param array $data
	 * @return Company|false
	 */
	public function store(User $user, array $data)
	{
		$company = new Company();

		$this->assignRepresentativeUser($company, $user);

		return $this->update($company, $data);
	}

	/**
	 * Assign company representative user
	 *
	 * @param Company $company
	 * @param User $user
	 * @return Company|false
	 */
	public function assignRepresentativeUser(Company $company, User $user)
	{
		$company->user()->associate($user);

		return $company;
	}

	/**
	 * Update the country of a company
	 *
	 * @param Company $company
	 * @param $countryId
	 * @return Company|false
	 */
	public function updateCountryByCountryId(Company $company, $countryId)
	{
		$country = Country::find($countryId);

		$company->country()->associate($country);

		return $company->save() ? $company : false;
	}
}