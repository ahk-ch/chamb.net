<?php

namespace App\Http\Controllers\Ahk;

use App\Ahk\Article;
use App\Ahk\Company;
use App\Ahk\Industry;
use App\Ahk\Repositories\Article\ArticleRepository;
use App\Ahk\Repositories\Industry\IndustryRepository;
use App\Ahk\Repositories\User\UserRepository;
use App\Ahk\Workgroup;
use App\Http\Controllers\Controller;

/**
 * Class IndustriesController.
 */
class IndustriesController extends Controller
{
    /**
     * @var ArticleRepository
     */
    private $articleRepository;
    /**
     * @var IndustryRepository
     */
    private $industryRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * CategoriesController constructor.
     *
     * @param ArticleRepository  $articleRepository
     * @param IndustryRepository $industryRepository
     * @param UserRepository     $userRepository
     */
    public function __construct(ArticleRepository $articleRepository, IndustryRepository $industryRepository,
                                UserRepository $userRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->industryRepository = $industryRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the info resource.
     *
     * @param Industry $industry
     *
     * @return \Illuminate\Http\Response
     */
    public function info(Industry $industry)
    {
        return view('ahk.industries.info', compact('industry'));
    }

    /**
     * Display a listing of the news resource.
     *
     * @param Industry $industry
     *
     * @return \Illuminate\Http\Response
     */
    public function indexArticles(Industry $industry)
    {
        $articles = $this->articleRepository->paginatePublishedByIndustry($industry);

        return view('ahk.industries.articles.index', compact('articles', 'industry'));
    }

    /**
     * Display a listing of the work-groups resource.
     *
     * @param Industry $industry
     *
     * @return \Illuminate\Http\Response
     */
    public function indexWorkGroup(Industry $industry)
    {
        $workGroups = $this->industryRepository->paginateWorkGroups($industry);

        return view('ahk.industries.work_groups.index', compact('industry', 'workGroups'));
    }

    /**
     * Show info about a work-group.
     *
     * @param Industry  $industry
     * @param Workgroup $workGroup
     *
     * @return \Illuminate\Http\Response
     */
    public function showWorkGroup(Industry $industry, Workgroup $workGroup)
    {
        $articles = $this->articleRepository->mostViewedByIndustry($industry, 3)->get();

        $events = $this->industryRepository->companyEvents($industry)->get();

        $decisions = $this->industryRepository->companyDecisions($industry)->get();

        $members = $this->userRepository->whereCompaniesIndustry($industry)->get();

        return view('ahk.industries.work_groups.show',
            compact('industry', 'workGroup', 'articles', 'events', 'decisions', 'members'));
    }

    /**
     * Display a listing of the news resource.
     *
     * @param Industry $industry
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCompanies(Industry $industry)
    {
        $companies = $this->industryRepository->getCompanies($industry);

        return view('ahk.industries.companies.index', compact('industry', 'companies'));
    }

    /**
     * Display the company.
     *
     * @param Industry $industry
     * @param Company  $company
     *
     * @return \Illuminate\Http\Response
     */
    public function showCompany(Industry $industry, Company $company)
    {
        return view('ahk.industries.companies.show', compact('industry', 'company'));
    }

    /**
     * Display the article.
     *
     * @param Industry $industry
     * @param Article  $article
     *
     * @return \Illuminate\Http\Response
     */
    public function showArticle(Industry $industry, Article $article)
    {
        return view('ahk.industries.articles.show', compact('industry', 'article'));
    }
}
