<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */
namespace App\Ahk\Repositories\Company;

use App\Ahk\Company;
use App\Ahk\Country;
use App\Ahk\File as AhkFile;
use App\Ahk\Industry;
use App\Ahk\Repositories\DbRepository;
use App\Ahk\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class DbCompanyRepository.
 */
class DbCompanyRepository extends DbRepository implements CompanyRepository
{
    /**
     * DbCompanyRepository constructor.
     *
     * @param Company $model
     */
    public function __construct(Company $model = null)
    {
        $model = $model === null ? new Company : $model;

        parent::__construct($model);
    }

    /**
     * Paginate through all companies.
     *
     * @param int $items
     *
     * @return mixed
     */
    public function paginate($items = 10)
    {
        return Company::paginate($items);
    }

    /**
     * Return all companies owned by given user, ready to be paginated.
     *
     * @param User $user
     *
     * @return mixed
     */
    public function getByUser(User $user)
    {
        return Company::where('user_id', $user->id);
    }

    /**
     * Store company.
     *
     * @param User  $user
     * @param array $data
     *
     * @return Company|false
     */
    public function store(User $user, array $data)
    {
        $company = new Company($data);

        $this->assignRepresentativeUser($company, $user);

        if (array_has($data, Company::LOGO_ID)) {
            $this->assignLogoById($company, $data[ Company::LOGO_ID ]);
        }

        return $this->update($company, $data);
    }

    /**
     * Assign company representative user.
     *
     * @param Company $company
     * @param User    $user
     *
     * @return Company|false
     */
    public function assignRepresentativeUser(Company $company, User $user)
    {
        $company->user()->associate($user);

        return $company;
    }

    /**
     * Update the logo of a company.
     *
     * @param Company $company
     * @param         $logoId
     *
     * @return Company|false
     */
    public function assignLogoById(Company $company, $logoId)
    {
        $logo = AhkFile::find($logoId);

        $company->logo()->associate($logo);

        return $company->save() ? $company : false;
    }

    /**
     * Update company.
     *
     * @param Company $company
     * @param         $data
     *
     * @return Company|false
     */
    public function update(Company $company, array $data)
    {
        $company = $this->updatePrimaryData($company, $data);

        $company = $this->assignIndustryById($company, $data[ Company::INDUSTRY_ID ]);

        $company = $this->assignCountryById($company, $data[ Company::COUNTRY_ID ]);

        return $company->save() ? $company : false;
    }

    /**
     * Update company primary data.
     *
     * @param Company $company
     * @param         $data
     *
     * @return Company|false
     */
    public function updatePrimaryData(Company $company, array $data)
    {
        $company->fill(array_only($data, [
            Company::NAME, Company::DESCRIPTION, Company::FOCUS, Company::BUSINESS_LEADER, Company::ADDRESS,
            Company::EMAIL, Company::PHONE_NUMBER,
        ]));

        return $company;
    }

    /**
     * Update the industry of a company.
     *
     * @param Company  $company
     * @param Industry $industryId
     *
     * @return Company|false
     */
    public function assignIndustryById(Company $company, $industryId)
    {
        $industry = Industry::find($industryId);

        $company->industry()->associate($industry);

        return $company->save() ? $company : false;
    }

    /**
     * Update the country of a company.
     *
     * @param Company $company
     * @param         $countryId
     *
     * @return Company|false
     */
    public function assignCountryById(Company $company, $countryId)
    {
        $country = Country::find($countryId);

        $company->country()->associate($country);

        return $company->save() ? $company : false;
    }

    /**
     * Add files to company.
     *
     * @param Company          $company
     * @param array|Collection $files
     *
     * @return Company|false
     */
    public function assignFiles(Company $company, $files)
    {
        $company->files()->saveMany($files);

        return $company->save() ? $company : false;
    }

    /**
     * Return all companies.
     *
     * @return mixed
     */
    public function all()
    {
        return Company::all();
    }

    /**
     * Add events to company.
     *
     * @param Company          $company
     * @param array|Collection $events
     *
     * @return Company|false
     */
    public function assignEvents(Company $company, $events)
    {
        $company->events()->saveMany($events);

        return $company->save() ? $company : false;
    }

    /**
     * Assign decisions to the company.
     *
     * @param Company $company
     * @param array   $decisions
     *
     * @return Company|false
     */
    public function assignDecisions(Company $company, $decisions)
    {
        $company->decisions()->saveMany($decisions);

        return $company->save() ? $company : false;
    }
}

