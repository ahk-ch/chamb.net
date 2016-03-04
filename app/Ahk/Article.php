<?php

namespace App\Ahk;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App\Ahk
 * @codeCoverageIgnore
 */
class Article extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'publish', 'source', 'description', 'content'];

    /**
     * The tags this article belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tags()
    {
        return $this->belongsToMany('App\Ahk\Tag')->withTimestamps();;
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
        return $this->belongsTo('App\Ahk\User');
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
        return $this->belongsTo('App\Ahk\Industry');
    }

    /**
     * @param File $thumbnail
     */
    public function assignThumbnail(File $thumbnail)
    {
        $this->thumbnail()->associate($thumbnail);
    }

    /**
     * Get the industry this article belongs to.
     */
    public function thumbnail()
    {
        return $this->belongsTo('App\Ahk\File');
    }
}

