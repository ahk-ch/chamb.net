<?php

namespace App\Ahk;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 * @package App\Ahk
 */
class Event extends Model implements SluggableInterface
{
	use SluggableTrait;

	/**
	 *
	 */
	const START_DATE = 'start_date';
	/**
	 *
	 */
	const END_DATE = 'end_date';

	/**
	 *
	 */
	const NAME = 'name';
	/**
	 *
	 */
	const DESCRIPTION = 'description';
	/**
	 *
	 */
	const SLUG = 'slug';

	/**
	 * @var array
	 */
	protected $fillable = [self::NAME, self::DESCRIPTION, self::SLUG, self::START_DATE, self::END_DATE];

	/**
	 * @var array
	 */
	protected $sluggable = [
		'build_from' => self::NAME,
		'save_to'    => self::SLUG,
	];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['created_at', 'updated_at', 'deleted_at', 'start_date', 'end_date'];

	/**
	 * Get all the owning eventable models.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function eventable()
	{
		return $this->morphTo();
	}

	/**
	 * Get the files of this events
	 */
	public function files()
	{
		return $this->morphMany(File::class, 'fileable');
	}
}
