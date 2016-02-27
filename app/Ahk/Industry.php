<?php

namespace App\Ahk;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Industry
 * @package App\Ahk
 * @codeCoverageIgnore
 */
class Industry extends Model
{
	/**
	 * @var array
	 */
	protected $fillable = ['name'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function countries()
	{
		return $this->hasMany('App\Ahk\Company');
	}

	/**
	 * Get the user this article was created from.
	 */
	public function author()
	{
		return $this->belongsTo('App\Ahk\User');
	}
	
	/**
	 * @param User $user
	 */
	public function assignAuthor(User $user)
	{
		$this->author()->associate($user);
	}
}
