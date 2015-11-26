<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   26/11/2015
 */

namespace App\AHK\Repositories\Article;


use App\AHK\Article;
use App\AHK\Category;
use App\AHK\User;
use Illuminate\Database\Eloquent\Collection;

interface ArticleRepository {

	/**
	 * Get all articles
	 * @return Collection
	 */
	public function all();

	/**
	 * Store an article on the storage
	 * @param User $author
	 * @param array $fillable
	 * @param Category $category
	 * @param array $tagIds
	 * @return Article|false
	 */
	public function store(User $author, array $fillable, Category $category, array $tagIds);

	/**
	 * Get an article given its id.
	 * @param $id
	 * @return Article
	 */
	public function getById($id);

	/**
	 * Update an article given it id.
	 * @param $id
	 * @param array $fillable
	 * @return mixed
	 */
	public function updateById($id, array $fillable);
}