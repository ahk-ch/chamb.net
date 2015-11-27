<?php

namespace App\AHK;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'publish', 'source', 'description', 'content', 'img_url'];

	/**
	 * The tags this article belongs to.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function tags()
	{
		return $this->belongsToMany('App\AHK\Tag')->withTimestamps();;
	}

	public function assignAuthor(User $user)
	{
		$this->author()->associate($user);
	}

	/**
	 * Get the user this category was created from.
	 */
	public function author()
	{
		return $this->belongsTo('App\AHK\User');
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
