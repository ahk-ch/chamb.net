<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   26/11/2015
 */

namespace App\AHK\Repositories\Industry;


use App\AHK\Industry;
use App\AHK\Repositories\DbRepository;
use App\AHK\User;
use Illuminate\Database\Eloquent\Collection;

class DbIndustryRepository extends DbRepository implements IndustryRepository
{

	/**
	 * Get all industries
	 * @return Collection
	 */
	public function all()
	{
		return Industry::with('author');
	}

	/**
	 * Store a industry on the storage
	 * @param User $author
	 * @param array $fillable
	 * @return Industry|false
	 */
	public function store(User $author, array $fillable)
	{
		$industry = new Industry($fillable);

		$industry->assignAuthor($author);

		return $industry->save() ? $industry : false;
	}

	/**
	 * Update a industry given it id.
	 * @param $id
	 * @param array $fillable
	 * @return mixed
	 */
	public function updateById($id, array $fillable)
	{
		$industry = $this->getById($id);

		$industry->fill($fillable);

		return $industry->save() ? $industry : false;
	}

	/**
	 * Get a industry given its id
	 * @param $id
	 * @return Industry
	 */
	public function getById($id)
	{
		return Industry::find($id);
	}
}