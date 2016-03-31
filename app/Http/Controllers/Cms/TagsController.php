<?php

namespace App\Http\Controllers\Cms;

use App\Ahk\Notifications\Flash;
use App\Ahk\Repositories\Tag\TagRepository;
use App\Ahk\Tag;
use App\Http\Requests\Cms\StoreTagRequest;
use App\Http\Requests\Cms\UpdateTagRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class TagsController.
 */
class TagsController extends BaseController
{
    /**
     * @var TagRepository
     */
    private $tagRepository;

    /**
     * @param TagRepository $tagRepository
     */
    public function __construct(TagRepository $tagRepository)
    {
        parent::__construct();

        $this->tagRepository = $tagRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = $this->tagRepository->all()->paginate(10);

        return view('cms.articles.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = new Tag();

        return view('cms.articles.tags.create', compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTagRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request)
    {
        $tagStored = $this->tagRepository->store(Auth::user(), $request->only('name'));

        if (! $tagStored) {
            Flash::error(trans('cms.unable_to_store_tag'));

            return redirect()->back();
        }

        Flash::success(trans('cms.tag_created'));

        return redirect()->route('cms.articles.tags.edit', $tagStored);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = $this->tagRepository->getById($id);

        return view('cms.articles.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int             $id
     * @param UpdateTagRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateTagRequest $request)
    {
        $tagSaved = $this->tagRepository->updateById($id, $request->only('name'));

        if (! $tagSaved) {
            Flash::error(trans('cms.something_went_wrong'));

            return redirect()->back();
        }

        Flash::success(trans('cms.tag_updated'));

        return redirect()->route('cms.articles.tags.edit', $tagSaved);
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
