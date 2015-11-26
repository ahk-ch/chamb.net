<?php

namespace App\AHK;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name'];

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
}
