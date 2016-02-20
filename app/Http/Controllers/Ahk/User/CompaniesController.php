<?php

namespace App\Http\Controllers\Ahk\User;

use App\Ahk\Company;
use App\Ahk\Industry;
use App\Ahk\Notifications\Flash;
use App\Ahk\Repositories\Company\CompanyRepository;
use App\Ahk\Repositories\Industry\IndustryRepository;
use App\Ahk\Repositories\User\UserRepository;
use App\Http\Controllers\Ahk\BaseController;
use App\Http\Requests;
use App\Http\Requests\Ahk\UpdateCompanyRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class CompaniesController
 * @package App\Http\Controllers\Ahk\User
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
	 * CompaniesController constructor.
	 * @param CompanyRepository $companyRepository
	 * @param UserRepository $userRepository
	 * @param IndustryRepository $industryRepository
	 */
	public function __construct(CompanyRepository $companyRepository, UserRepository $userRepository,
	                            IndustryRepository $industryRepository)
	{
		parent::__construct();

		$this->middleware('auth');

		$this->companyRepository = $companyRepository;
		$this->userRepository = $userRepository;
		$this->industryRepository = $industryRepository;
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

		$company->industry = new Industry();

		$industries = $this->industryRepository->all()->pluck('name', 'id');

		return view('ahk.my.companies.create', compact('company', 'industries'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Requests\Ahk\StoreCompanyRequest $request
	 * @return \Illuminate\Http\Response
	 * @internal param Requests\Ahk\StoreCompanyRequest $storeCompanyRequest
	 * @internal param Request $request
	 */
	public function store(Requests\Ahk\StoreCompanyRequest $request)
	{
		$user = Auth::user();
		$formData = $request->only([
			'name', 'description', 'focus', 'business_leader', 'address', 'email',
			'phone_number', 'industry_id']);

		if ( ! $company = $this->companyRepository->store($user, $formData) )
		{
			Flash::error(trans('ahk_messages.unknown_error_occurred'));

			return back()->withInput();
		}

		if ( $request->file('logo') !== null )
		{
			$this->companyRepository->updateLogo($company, $request->file('logo')->getRealpath());
		}

		Flash::success(trans('ahk_messages.company_successfully_stored'));

		return redirect()->route('my.companies.edit', ['slug' => $company->slug]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Company $company
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Company $company)
	{
		$industries = $this->industryRepository->all()->pluck('name', 'id');

		return view('ahk.my.companies.edit', compact('company', 'industries'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param UpdateCompanyRequest $request
	 * @param Company $company
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateCompanyRequest $request, Company $company)
	{
		$user = Auth::user();
		$formData = $request->only([
			'name', 'description', 'focus', 'business_leader', 'address', 'email',
			'phone_number', 'slug', 'industry_id']);

		if ( ! $this->userRepository->hasCompany($user, $company) )
		{
			Flash::error(trans('ahk_messages.company_successfully_updated'));

			return back()->withInput();
		}

		if ( ! $company = $this->companyRepository->update($company, $formData) )
		{
			Flash::error(trans('ahk_messages.unknown_error_occurred'));

			return back()->withInput();
		}

		if ( $request->file('logo') !== null )
		{
			$this->companyRepository->updateLogo($company, $request->file('logo')->getRealpath());
		}

		Flash::success(trans('ahk_messages.company_successfully_updated'));

		return redirect()->route('my.companies.edit', ['slug' => $company->slug]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
