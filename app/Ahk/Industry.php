<?php

namespace App\Ahk;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Industry
 * @package App\Ahk
 * @codeCoverageIgnore
 */
class Industry extends Model implements SluggableInterface
{
	use SluggableTrait;
	
	/**
	 *
	 */
	const SLUG = 'slug';
	/**
	 *
	 */
	const NAME = 'name';
	/**
	 *
	 */
	const FONTAWESOME = 'fontawesome';

	/**
	 * @var array
	 */
	protected $fillable = [self::FONTAWESOME, self::NAME, self::SLUG];

	/**
	 * @var array
	 */
	protected $sluggable = [
		'build_from' => self::NAME,
		'save_to' => self::SLUG,
	];

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
		return self::SLUG;
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function countries()
	{
		return $this->hasMany('App\Ahk\Company');
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
		return $this->belongsTo('App\Ahk\User');
	}
}

