<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   26/11/2015
 */

namespace App\Ahk\Repositories\Industry;

use App\Ahk\Industry;
use App\Ahk\User;
use Illuminate\Database\Eloquent\Collection;

interface IndustryRepository
{

	/**
	 * Get all industries
	 *
	 * @return Collection
	 */
	public function all();

	/**
	 * Get companies of an industry
	 *
	 * @param Industry $industry
	 *
	 * @return Collection
	 */
	public function getCompanies(Industry $industry);

	/**
	 * Store an industry on the storage
	 *
	 * @param User  $author
	 * @param array $fillable
	 *
	 * @return Industry|false
	 */
	public function store(User $author, array $fillable);

	/**
	 * Get a industry given its id.
	 *
	 * @param $id
	 *
	 * @return Industry
	 */
	public function getById($id);

	/**
	 * Update a industry given its id.
	 *
	 * @param       $id
	 * @param array $fillable
	 *
	 * @return mixed
	 */
	public function updateById($id, array $fillable);

	/**
	 * Assign workgroups to an industry
	 *
	 * @param Industry $industry
	 * @param array    $workgroupIds
	 *
	 * @return mixed
	 */
	public function assignWorkGroupsById(Industry $industry, array $workgroupIds);

	/**
	 * Get workgroups of an industry
	 *
	 * @param Industry $industry
	 *
	 * @return Collection
	 */
	public function getWorkGroups(Industry $industry);

	/**
	 * Paginate workgroups of an industry
	 *
	 * @param Industry $industry
	 * @param null     $perPage
	 * @param array    $columns
	 * @param string   $pageName
	 * @param null     $page
	 *
	 * @return Collection
	 */
	public function paginateWorkGroups(Industry $industry, $perPage = null, $columns = ['*'], $pageName = 'page', $page = null);

	/**
	 * Get all events of companies belonging to an industry
	 *
	 * @param Industry $industry
	 *
	 * @return mixed
	 */
	public function companyEvents(Industry $industry);

	/**
	 * Get all files of companies belonging to an industry
	 *
	 * @param Industry $industry
	 *
	 * @return mixed
	 */
	public function companyFiles(Industry $industry);

	/**
	 * Get all decisions of companies belonging to an industry
	 *
	 * @param Industry $industry
	 *
	 * @return mixed
	 */
	public function companyDecisions(Industry $industry);
}
