<?php

namespace App\AHK;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App\AHK
 */
class Article extends Model
{

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

	/**
	 * @param User $user
	 */
	public function assignAuthor(User $user)
	{
		$this->author()->associate($user);
	}

	/**
	 * Get the user this article was created from.
	 */
	public function author()
	{
		return $this->belongsTo('App\AHK\User');
	}

	/**
	 * @param Industry $industry
	 */
	public function assignIndustry(Industry $industry)
	{
		$this->industry()->associate($industry);
	}

	/**
	 * Get the industry this article belongs to.
	 */
	public function industry()
	{
		return $this->belongsTo('App\AHK\Industry');
	}
}
