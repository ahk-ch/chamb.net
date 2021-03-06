<?php

namespace App\Ahk;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Workgroup.
 *
 * @codeCoverageIgnore
 */
class Workgroup extends Model implements SluggableInterface
{
    use SluggableTrait;

    const NAME = 'name';
    const SLUG = 'slug';
    const DESCRIPTION = 'description';

    /**
     * @var array
     */
    protected $sluggable = [
        'build_from' => self::NAME,
        'save_to'    => self::SLUG,
    ];

    /**
     * @var array
     */
    protected $fillable = [self::NAME, self::SLUG, self::DESCRIPTION];

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function industries()
    {
        return $this->belongsToMany(Industry::class)->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function authors()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /**
     * Get creator user.
     */
    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
