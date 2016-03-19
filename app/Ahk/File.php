<?php

namespace App\Ahk;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class File.
 *
 * @codeCoverageIgnore
 */
class File extends Model implements SluggableInterface
{
    use SluggableTrait;

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
    const PATH = 'path';
    /**
     *
     */
    const SLUG = 'slug';
    /**
     *
     */
    const TEMPORARY_PATH = 'file_path';
    /**
     *
     */
    const CLIENT_ORIGINAL_NAME = 'client_original_name';

    /**
     * @var array
     */
    protected $fillable = [self::NAME, self::DESCRIPTION, self::PATH, self::SLUG, self::CLIENT_ORIGINAL_NAME];

    /**
     * @var array
     */
    protected $sluggable = [
        'build_from' => self::CLIENT_ORIGINAL_NAME,
        'save_to'    => self::SLUG,
    ];


    /**
     * Get all the owning fileable models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function fileable()
    {
        return $this->morphTo();
    }
}

