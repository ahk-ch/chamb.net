<?php

namespace App\AHK;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'published', 'source', 'description', 'content'];

	/**
	 * The tags this article belongs to.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function tags()
	{
		return $this->belongsTo('App\AHK\Tag');
	}

	public function assignAuthor(User $user)
	{
		$this->author()->associate($user);
	}

	public function assignCategory(Category $category)
	{
		$this->category()->associate($category);
	}

	/**
	 * Get the category this article belongs to.
	 */
	public function category()
	{
		return $this->belongsTo('App\AHK\Category');
	}
}
