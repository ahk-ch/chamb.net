<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   26/11/2015
 */

namespace App\AHK\Repositories\Category;


use App\AHK\Category;
use App\AHK\Repositories\DbRepository;
use Illuminate\Database\Eloquent\Collection;

class DbCategoryRepository extends DbRepository implements CategoryRepository {

	/**
	 * Get all categories
	 * @return Collection
	 */
	public function all()
	{
		return Category::with('author')->get();
	}
}