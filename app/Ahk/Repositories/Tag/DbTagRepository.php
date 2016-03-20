<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   26/11/2015
 */
namespace App\Ahk\Repositories\Tag;

use App\Ahk\Repositories\DbRepository;
use App\Ahk\Tag;
use App\Ahk\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class DbTagRepository.
 */
class DbTagRepository extends DbRepository implements TagRepository
{
    /**
     * DbTagRepository constructor.
     *
     * @param Tag $model
     */
    public function __construct(Tag $model = null)
    {
        $model = $model === null ? new Tag : $model;

        parent::__construct($model);
    }

    /**
     * Get all tags.
     *
     * @return Collection
     */
    public function all()
    {
        return Tag::with('author');
    }

    /**
     * Store a tag on the storage.
     *
     * @param User  $author
     * @param array $fillable
     *
     * @return Tag|false
     */
    public function store(User $author, array $fillable)
    {
        $tag = new Tag($fillable);

        $tag->assignAuthor($author);

        return $tag->save() ? $tag : false;
    }

    /**
     * Update a tag given it id.
     *
     * @param       $id
     * @param array $fillable
     *
     * @return mixed
     */
    public function updateById($id, array $fillable)
    {
        $tag = $this->getById($id);

        $tag->fill($fillable);

        return $tag->save() ? $tag : false;
    }

    /**
     * Get a tag given its id.
     *
     * @param $id
     *
     * @return Tag
     */
    public function getById($id)
    {
        return Tag::find($id);
    }
}

