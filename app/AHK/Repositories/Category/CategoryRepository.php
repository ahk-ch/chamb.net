<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   26/11/2015
 */

namespace App\AHK\Repositories\Category;


use Illuminate\Database\Eloquent\Collection;

interface CategoryRepository {

	/**
	 * Get all categories
	 * @return Collection
	 */
	public function all();
}