<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace App\AHK\Repositories\User;


use App\AHK\User;
use App\Http\Requests\StoreUserRequest;

interface UserRepository {

	/**
	 * Store a user on the storage
	 * @param StoreUserRequest $storeUserRequest
	 * @return User|false
	 */
	public function store(StoreUserRequest $storeUserRequest);
}