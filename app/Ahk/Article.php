<?php

namespace App\Ahk;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article.
 *
 * @codeCoverageIgnore
 */
class Article extends Model implements SluggableInterface
{
    use SluggableTrait;

    const TITLE = 'title';
    const PUBLISH = 'publish';
    const SOURCE = 'source';
    const DESCRIPTION = 'description';
    const CONTENT = 'content';
    const SLUG = 'slug';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [self::TITLE, self::PUBLISH, self::SOURCE, self::DESCRIPTION, self::CONTENT];

    /**
     * @var array
     */
    protected $sluggable = [
        'build_from' => self::TITLE,
        'save_to' => self::SLUG,
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
     * The tags this article belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
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
     * @param Industry $industry
     */
    public function assignIndustry(Industry $industry)
    {
        $this->industry()->associate($industry);
    }

    /**
     * Get the industry this article belongs to.
     */
    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    /**
     * @param File $thumbnail
     */
    public function assignThumbnail(File $thumbnail)
    {
        $this->thumbnail()->associate($thumbnail);
    }

    /**
     * Get the thumbnail this article belongs to.
     */
    public function thumbnail()
    {
        return $this->belongsTo('App\Ahk\File');
    }
}
