<?php

namespace App\Ahk;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class File extends Model implements SluggableInterface
{
	use SluggableTrait;

	protected $fillable = ['name', 'description', 'path', 'slug'];

	protected $sluggable = [
		'build_from' => 'name',
		'save_to'    => 'slug',
	];
}

