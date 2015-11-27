<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   26/11/2015
 */

namespace App\AHK\Repositories\Article;


use App\AHK\Article;
use App\AHK\Category;
use App\AHK\Repositories\DbRepository;
use App\AHK\User;
use Illuminate\Database\Eloquent\Collection;

class DbArticleRepository extends DbRepository implements ArticleRepository {

	/**
	 * Get all articles
	 * @return Collection
	 */
	public function all()
	{
		return Article::with('author', 'category', 'tags');
	}

	/**
	 * Store an article on the storage
	 * @param User $author
	 * @param array $fillable
	 * @param Category $category
	 * @return Article|false
	 */
	public function store(User $author, array $fillable, Category $category)
	{
		$article = new Article($fillable);

		$article->assignAuthor($author);

		$article->assignCategory($category);

		return $article->save() ? $article : false;
	}

	/**
	 * Update an article given it id.
	 * @param $articleId
	 * @param array $fillable
	 * @param Category $category
	 * @return mixed
	 * @internal param $id
	 */
	public function updateById($articleId, array $fillable, Category $category)
	{
		$article = $this->getById($articleId);

		$article->fill($fillable);

		$article->assignCategory($category);

		return $article->save() ? $article : false;
	}

	/**
	 * Update the tags of an article
	 * @param $id Article id
	 * @param array $tagIds
	 * @return Article|false
	 */
	public function updateTagsById($id, array $tagIds)
	{
		$article = $this->getById($id);

		$article->tags()->sync($tagIds);

		return $article->save() ? $article : false;
	}

	/**
	 * Get a category given its id
	 * @param $id
	 * @return Category
	 */
	public function getById($id)
	{
		return Article::with('author', 'category', 'tags')
			->where('articles.id', $id)->first();
	}


	/**
	 * Return published articles
	 * @return mixed
	 */
	public function published()
	{
		return Article::with('author', 'category', 'tags')->where('publish', true);
	}

	/**
	 * Return unpublished articles
	 * @return mixed
	 */
	public function unpublished()
	{
		return Article::with('author', 'category', 'tags')->where('publish', false);
	}
}