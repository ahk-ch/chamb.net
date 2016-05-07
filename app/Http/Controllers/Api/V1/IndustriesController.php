<?php

namespace App\Http\Controllers\Api\V1;

use App\Ahk\Repositories\Company\CompanyRepository;
use App\Ahk\Responses\ApiResponse;
use App\Ahk\Transformers\Api\CompanyApiTransformer;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class IndustriesController extends Controller
{
    use ApiResponse;

    /**
     * @var CompanyRepository
     */
    private $companyRepository;
    /**
     * @var CompanyApiTransformer
     */
    private $companyApiTransformer;

    /**
     * IndustriesController constructor.
     * @param CompanyRepository $companyRepository
     * @param CompanyApiTransformer $companyApiTransformer
     */
    public function __construct(CompanyRepository $companyRepository, CompanyApiTransformer $companyApiTransformer)
    {
        $this->companyRepository = $companyRepository;
        $this->companyApiTransformer = $companyApiTransformer;
    }

    /**
     * @return array
     */
    public function indexCompanies()
    {
        $companiesPagination = $this->companyRepository->paginate();

        $companies = $this->companyApiTransformer->transformCollection($companiesPagination);

        return $this->respondWithPagination($companiesPagination, ['data' => $companies]);
    }
}
