<?php

namespace App\Ahk;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class File extends Model implements SluggableInterface
{
	use SluggableTrait;

	const NAME = 'name';
	const DESCRIPTION = 'description';
	const PATH = 'path';
	const SLUG = 'slug';
	const TEMPORARY_PATH = 'file_path'; 

	protected $fillable = [self::NAME, self::DESCRIPTION, self::PATH, self::SLUG];

	protected $sluggable = [
		'build_from' => self::NAME,
		'save_to'    => self::SLUG,
	];
}

