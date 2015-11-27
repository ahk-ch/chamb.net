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
	 * @return Article|false
	 */
	public function store(User $author, array $fillable, Category $category);

	/**
	 * Return published articles
	 * @return mixed
	 */
	public function published();

	/**
	 * Return unpublished articles
	 * @return mixed
	 */
	public function unpublished();

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

	/**
	 * Update tags of an article.
	 * @param $id
	 * @param array $tagIds
	 * @return mixed
	 */
	public function  updateTagsById($id, array $tagIds);
}