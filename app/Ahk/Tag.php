<?php

namespace App\Ahk;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 * @package App\Ahk
 * @codeCoverageIgnore
 */
class Tag extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name'];

	/**
	 * @param User $user
	 */
	public function assignAuthor(User $user)
	{
		$this->author()->associate($user);
	}

	/**
	 * Get the user this tag was created from.
	 */
	public function author()
	{
		return $this->belongsTo('App\Ahk\User');
	}
}
