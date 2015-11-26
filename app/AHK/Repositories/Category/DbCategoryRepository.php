<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   26/11/2015
 */

namespace App\AHK\Repositories\Category;


use App\AHK\Category;
use App\AHK\Repositories\DbRepository;
use App\AHK\User;
use Illuminate\Database\Eloquent\Collection;

class DbCategoryRepository extends DbRepository implements CategoryRepository {

	/**
	 * Get all categories
	 * @return Collection
	 */
	public function all()
	{
		return Category::with('author');
	}

	/**
	 * Store a category on the storage
	 * @param User $author
	 * @param array $fillable
	 * @return Category|false
	 */
	public function store(User $author, array $fillable)
	{
		$category = new Category($fillable);

		$category->assignAuthor($author);

		return $category->save() ? $category : false;
	}

	/**
	 * Update a category given it id.
	 * @param $id
	 * @param array $fillable
	 * @return mixed
	 */
	public function updateById($id, array $fillable)
	{
		$category = $this->getById($id);

		$category->fill($fillable);

		return $category->save() ? $category : false;
	}

	/**
	 * Get a category given its id
	 * @param $id
	 * @return Category
	 */
	public function getById($id)
	{
		return Category::find($id);
	}
}