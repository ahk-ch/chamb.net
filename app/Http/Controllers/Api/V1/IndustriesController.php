<?php

namespace App\Http\Controllers\Api\V1;

use App\Ahk\Repositories\Company\CompanyRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class IndustriesController extends Controller
{
    /**
     * @var CompanyRepository
     */
    private $companyRepository;

    /**
     * IndustriesController constructor.
     * @param CompanyRepository $companyRepository
     */
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * @return array
     */
    public function indexCompanies()
    {
        return $this->companyRepository->paginate();
    }
}
