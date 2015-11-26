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
	 * @param array $tagIds
	 * @return Article|false
	 */
	public function store(User $author, array $fillable, Category $category, array $tagIds)
	{
		$article = new Article($fillable);

		$article->assignAuthor($author);

		$article->assignCategory($category);

		if ( ! $article->save() ) return false;

		$article->tags()->attach($tagIds);

		return $article->save() ? $article : false;
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