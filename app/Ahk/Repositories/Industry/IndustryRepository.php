<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   26/11/2015
 */

namespace App\Ahk\Repositories\Industry;


use App\Ahk\Industry;
use App\Ahk\User;
use Illuminate\Database\Eloquent\Collection;

interface IndustryRepository {

	/**
	 * Get all industry
	 * @return Collection
	 */
	public function all();

	/**
	 * Store an industry on the storage
	 * @param User $author
	 * @param array $fillable
	 * @return Industry|false
	 */
	public function store(User $author, array $fillable);

	/**
	 * Get a industry given its id.
	 * @param $id
	 * @return Industry
	 */
	public function getById($id);

	/**
	 * Update a industry given it id.
	 * @param $id
	 * @param array $fillable
	 * @return mixed
	 */
	public function updateById($id, array $fillable);
}