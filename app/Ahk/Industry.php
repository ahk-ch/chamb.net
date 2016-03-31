<?php

namespace App\Ahk;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Industry.
 *
 * @codeCoverageIgnore
 */
class Industry extends Model implements SluggableInterface
{
    use SluggableTrait;

    const SLUG = 'slug';
    const NAME = 'name';
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function countries()
    {
        return $this->hasMany(Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companyFiles()
    {
        return $this->hasManyThrough(File::class, Company::class, 'industry_id', 'fileable_id')
            ->where('fileable_type', basename(Company::class));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companyDecisions()
    {
        return $this->hasManyThrough(Decision::class, Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companyEvents()
    {
        return $this->hasManyThrough(Event::class, Company::class, 'industry_id', 'eventable_id')
            ->where('eventable_type', basename(Company::class));
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
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function workgroups()
    {
        return $this->belongsToMany(Workgroup::class)->withTimestamps();
    }
}
