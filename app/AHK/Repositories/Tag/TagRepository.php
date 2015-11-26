<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   26/11/2015
 */

namespace App\AHK\Repositories\Tag;


use App\AHK\Tag;
use App\AHK\User;
use Illuminate\Database\Eloquent\Collection;

interface TagRepository {

	/**
	 * Get all tags
	 * @return Collection
	 */
	public function all();

	/**
	 * Store a tag on the storage
	 * @param User $author
	 * @param array $fillable
	 * @return Tag|false
	 */
	public function store(User $author, array $fillable);

	/**
	 * Get a tag given its id.
	 * @param $id
	 * @return Tag
	 */
	public function getById($id);

	/**
	 * Update a category given it id.
	 * @param $id
	 * @param array $fillable
	 * @return mixed
	 */
	public function updateById($id, array $fillable);
}