<?php

namespace App\Ahk;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * @package App\Ahk
 * @codeCoverageIgnore
 */
class Company extends Model implements SluggableInterface
{
	use SluggableTrait;

	/**
	 *
	 */
	const NAME = 'name';
	/**
	 *
	 */
	const LOGO_ID = 'logo_id';
	/**
	 *
	 */
	const COUNTRY_ID = 'country_id';
	/**
	 *
	 */
	const INDUSTRY_ID = 'industry_id';
	/**
	 *
	 */
	const DESCRIPTION = 'description';
	/**
	 *
	 */
	const FOCUS = 'focus';
	/**
	 *
	 */
	const BUSINESS_LEADER = 'business_leader';
	/**
	 *
	 */
	const ADDRESS = 'address';
	/**
	 *
	 */
	const EMAIL = 'email';
	/**
	 *
	 */
	const PHONE_NUMBER = 'phone_number';
	/**
	 *
	 */
	const LOGO_PATH = 'logo_path';
	/**
	 *
	 */
	const SLUG = 'slug';

	/**
	 * @var array
	 */
	protected $fillable = [
		self::NAME, self::DESCRIPTION, self::FOCUS, self::BUSINESS_LEADER, self::ADDRESS, self::EMAIL,
		self::PHONE_NUMBER, self::SLUG,
	];

	/**
	 * @var array
	 */
	protected $sluggable = [
		'build_from' => self::NAME,
		'save_to'    => self::SLUG,
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
	 * Get the industry of this company.
	 */
	public function industry()
	{
		return $this->belongsTo('App\Ahk\Industry');
	}

	/**
	 * Get the representative user of this company.
	 */
	public function user()
	{
		return $this->belongsTo('App\Ahk\User');
	}

	/**
	 * Get the country of this company.
	 */
	public function country()
	{
		return $this->belongsTo('App\Ahk\Country');
	}

	/**
	 * Get the country of this company.
	 */
	public function logo()
	{
		return $this->belongsTo('App\Ahk\File');
	}

	/**
	 * Get the services this company requires
	 */
	public function requiresServices()
	{
		return $this->belongsToMany('App\Ahk\Service')
			->wherePivot('requires', true)
			->withTimestamps();
	}

	/**
	 * Get the services this company requires
	 */
	public function offersServices()
	{
		return $this->belongsToMany('App\Ahk\Service')
			->wherePivot('offers', true)
			->withTimestamps();
	}

	/**
	 * Get the services this company requires
	 */
	public function services()
	{
		return $this->belongsToMany('App\Ahk\Service')
			->withTimestamps();
	}

	/**
	 * Get the services this company requires
	 */
	public function files()
	{
		return $this->morphMany('App\Ahk\File', 'fileable');
	}
}

