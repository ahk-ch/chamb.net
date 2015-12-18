<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   26/11/2015
 */

namespace App\AHK\Repositories\Article;


use App\AHK\Article;
use App\AHK\Industry;
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
	 * @param Industry $industry
	 * @return Article|false
	 */
	public function store(User $author, array $fillable, Industry $industry);

	/**
	 * Update an article given by its id.
	 * @param $articleId
	 * @param array $fillable
	 * @param Industry $industry
	 * @return mixed
	 */
	public function updateById($articleId, array $fillable, Industry $industry);

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
	 * Update tags of an article.
	 * @param $id
	 * @param array $tagIds
	 * @return mixed
	 */
	public function  updateTagsById($id, array $tagIds);
}