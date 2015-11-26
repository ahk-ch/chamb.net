<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   26/11/2015
 */

namespace App\AHK\Repositories\Category;


use App\AHK\Category;
use App\AHK\User;
use App\Http\Requests\Admin\StoreCategoryRequest;
use Illuminate\Database\Eloquent\Collection;

interface CategoryRepository {

	/**
	 * Get all categories
	 * @return Collection
	 */
	public function all();

	/**
	 * Store a category on the storage
	 * @param StoreCategoryRequest $request
	 * @param User $author
	 * @return Category|false
	 */
	public function store(StoreCategoryRequest $request, User $author);

	/**
	 * Get a category given its id.
	 * @param $id
	 * @return Category
	 */
	public function getById($id);

	/**
	 * Update a category given it id.
	 * @param $id
	 * @param array $fillable
	 * @return mixed
	 */
	public function updateById($id, array $fillable);
}