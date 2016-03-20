<?php

namespace App\Http\ViewComposers\Ahk;

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   24/11/2015
 */
use App\Ahk\Repositories\Industry\IndustryRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;

/**
 * Class MasterComposer.
 */
class MasterComposer
{
    /**
     * @var IndustryRepository
     */
    private $industryRepository;

    public function __construct(IndustryRepository $industryRepository)
    {

        $this->industryRepository = $industryRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        ! session('locale') ?: App::setLocale(session('locale'));

        $view->with('locale', App::getLocale());

        $view->with('industries', $this->industryRepository->all());
    }
}

