<?php

namespace App\Http\Controllers\Ahk\User;

use App\Ahk\Company;
use App\Ahk\Repositories\Company\CompanyRepository;
use App\Ahk\Repositories\User\UserRepository;
use App\Http\Controllers\Ahk\BaseController;
use App\Http\Requests;
use App\Http\Requests\Ahk\UpdateCompanyRequest;
use Illuminate\Http\Request;
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
	 * CompaniesController constructor.
	 * @param CompanyRepository $companyRepository
	 */
	public function __construct(CompanyRepository $companyRepository)
	{
		parent::__construct();

		$this->middleware('auth');

		$this->companyRepository = $companyRepository;
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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Company $company
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Company $company)
	{
		return view('ahk.my.companies.edit', compact('company'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateCompanyRequest $request, $id)
	{
		//
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
