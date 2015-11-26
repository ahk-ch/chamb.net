<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   26/11/2015
 */

namespace App\AHK\Repositories\Category;


use App\AHK\Category;
use App\AHK\User;
use Illuminate\Database\Eloquent\Collection;

interface CategoryRepository {

	/**
	 * Get all categories
	 * @return Collection
	 */
	public function all();

	/**
	 * Store a category on the storage
	 * @param User $author
	 * @param array $fillable
	 * @return Category|false
	 */
	public function store(User $author, array $fillable);

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