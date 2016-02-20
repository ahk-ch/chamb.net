<?php

namespace App\Http\Controllers\Ahk;

use App\Ahk\Company;
use App\Ahk\Industry;
use App\Ahk\Repositories\Company\CompanyRepository;
use App\Ahk\Repositories\Industry\IndustryRepository;
use App\Ahk\Storage\FilesStorage;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
	/**
	 * @var CompanyRepository
	 */
	private $companyRepository;
	/**
	 * @var IndustryRepository
	 */
	private $industryRepository;

	public function __construct(CompanyRepository $companyRepository, IndustryRepository $industryRepository)
	{
		$this->companyRepository = $companyRepository;

		$this->industryRepository = $industryRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$companies = $this->companyRepository->paginate(4);

		$industries = $this->industryRepository->all()->get();

		return view('ahk.companies.index', compact('companies', 'industries'));
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
	 * Display the specified resource.
	 *
	 * @param Company $company
	 * @return \Illuminate\Http\Response
	 */
	public function show(Company $company)
	{
		return view('ahk.companies.show', compact('company'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
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
