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
	 * Get the category this article belongs to.
	 */
	public function firm()
	{
		return $this->belongsTo('App\AHK\Category');
	}

	/**
	 * The tags this article belongs to.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function tags()
	{
		return $this->belongsTo('App\AHK\Tag');
	}
}
