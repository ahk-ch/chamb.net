<?php

namespace App\Http\Controllers\Ahk\User;

use App\Ahk\Company;
use App\Ahk\Country;
use App\Ahk\File;
use App\Ahk\Industry;
use App\Ahk\Notifications\Flash;
use App\Ahk\Repositories\Company\CompanyRepository;
use App\Ahk\Repositories\Country\CountryRepository;
use App\Ahk\Repositories\File\FileRepository;
use App\Ahk\Repositories\Industry\IndustryRepository;
use App\Ahk\Repositories\User\UserRepository;
use App\Ahk\User;
use App\Http\Controllers\Ahk\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Ahk\UpdateCompanyRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class CompaniesController.
 */
class CompaniesController extends BaseController
{
    /**
     * @var CompanyRepository
     */
    private $companyRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var IndustryRepository
     */
    private $industryRepository;
    /**
     * @var CountryRepository
     */
    private $countryRepository;
    /**
     * @var FileRepository
     */
    private $fileRepository;

    /**
     * CompaniesController constructor.
     *
     * @param CompanyRepository  $companyRepository
     * @param UserRepository     $userRepository
     * @param IndustryRepository $industryRepository
     * @param CountryRepository  $countryRepository
     * @param FileRepository     $fileRepository
     */
    public function __construct(CompanyRepository $companyRepository, UserRepository $userRepository,
                                IndustryRepository $industryRepository, CountryRepository $countryRepository,
                                FileRepository $fileRepository)
    {
        $this->companyRepository = $companyRepository;
        $this->userRepository = $userRepository;
        $this->industryRepository = $industryRepository;
        $this->countryRepository = $countryRepository;
        $this->fileRepository = $fileRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = $this->companyRepository->getByUser(Auth::user())->get();

        return view('ahk.my.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = new Company;
        $company->industry = new Industry;
        $company->country = new Country;
        $company->author = new User;
        $company->logo = new File;

        $industries = $this->industryRepository->all()->pluck('name', 'id');

        $countries = $this->countryRepository->all()->pluck('name', 'id');

        return view('ahk.my.companies.create', compact('company', 'industries', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\Ahk\StoreCompanyRequest $request
     *
     * @return \Illuminate\Http\Response
     * @internal param Requests\Ahk\StoreCompanyRequest $storeCompanyRequest
     * @internal param Request $request
     */
    public function store(Requests\Ahk\StoreCompanyRequest $request)
    {
        $user = Auth::user();
        $requestData = $request->all();
        $file = $request->file('logo_path');

        $file = $this->fileRepository->store([
            File::CLIENT_ORIGINAL_NAME => $file->getClientOriginalName(),
            File::TEMPORARY_PATH       => $file->getRealPath(),
        ]);

        if (! $file) {
            Flash::error(trans('ahk_messages.unknown_error_occurred'));

            return redirect()->back();
        }

        $requestData[ Company::LOGO_ID ] = $file->id;

        if (! $company = $this->companyRepository->store($user, $requestData)) {
            Flash::error(trans('ahk_messages.unknown_error_occurred'));

            return back()->withInput();
        }

        Flash::success(trans('ahk_messages.company_successfully_stored'));

        return redirect()->route('my.companies.edit', ['slug' => $company->slug]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $industries = $this->industryRepository->all()->pluck('name', 'id');

        $countries = $this->countryRepository->all()->pluck('name', 'id');

        return view('ahk.my.companies.edit', compact('company', 'industries', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCompanyRequest $request
     * @param Company              $company
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $user = Auth::user();

        if (! $this->userRepository->hasCompany($user, $company)) {
            Flash::error(trans('ahk_messages.you_do_not_have_the_necessary_privileges'));

            return back()->withInput();
        }

        $file = $request->file('logo_path');

        if (null !== $file) {
            $this->fileRepository->update($company->logo, [
                File::CLIENT_ORIGINAL_NAME => $file->getClientOriginalName(),
                File::TEMPORARY_PATH       => $file->getRealPath(),
            ]);
        }

        if (! $company = $this->companyRepository->update($company, $request->all())) {
            Flash::error(trans('ahk_messages.unknown_error_occurred'));

            return redirect()->back();
        }

        Flash::success(trans('ahk_messages.company_successfully_updated'));

        return redirect()->route('my.companies.edit', ['slug' => $company->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
