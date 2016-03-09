<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   26/11/2015
 */

namespace App\Ahk\Repositories\Industry;

use App\Ahk\Company;
use App\Ahk\Industry;
use App\Ahk\Repositories\DbRepository;
use App\Ahk\User;
use Illuminate\Database\Eloquent\Collection;

class DbIndustryRepository extends DbRepository implements IndustryRepository
{

	/**
	 * Get all industry
	 * @return Collection
	 */
	public function all()
	{
		return Industry::with('author')->get();
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

	/**
	 * Get companies of an industry
	 * @param Industry $industry
	 * @return Collection
	 */
	public function getCompanies(Industry $industry)
	{
		return $this->getCompaniesById($industry->id);
	}

	private function getCompaniesById($id)
	{
		return Company::where('industry_id', $id)->get();
	}

	/**
	 * Assign workgroups to an industry
	 *
	 * @param Industry $industry
	 * @param array $workgroupIds
	 * @return mixed
	 */
	public function assignWorkGroupsById(Industry $industry, array $workgroupIds)
	{
		$industry->workgroups()->sync($workgroupIds);

		return $industry->save() ? $industry : false;
	}

	/**
	 * Get workgroups of an industry
	 * @param Industry $industry
	 * @return Collection
	 */
	public function getWorkGroups(Industry $industry)
	{
		return $industry->workgroups()->get();
	}

	/**
	 * Paginate workgroups of an industry
	 * @param Industry $industry
	 * @param int $perPage
	 * @param array $columns
	 * @param string $pageName
	 * @param null $page
	 * @return Collection
	 */
	public function paginateWorkGroups(Industry $industry, $perPage = 10, $columns = ['*'], $pageName = 'page', $page = null)
	{
		return $industry->workgroups()->paginate($perPage, $columns, $pageName, $page);
	}

	/**
	 * Get all events of companies belonging to an industry
	 *
	 * @param Industry $industry
	 * @return mixed
	 */
	public function companyEvents(Industry $industry)
	{
		return $industry->companyEvents();
	}

	/**
	 * Get all files of companies belonging to an industry
	 *
	 * @param Industry $industry
	 * @return mixed
	 */
	public function companyFiles(Industry $industry)
	{
		return $industry->companyFiles();
	}
}

