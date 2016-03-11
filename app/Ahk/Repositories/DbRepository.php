<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace App\Ahk\Repositories;


abstract class DbRepository
{
	/**
	 * Eloquent model
	 */
	protected $model;

	/**
	 * @param $model
	 */
	function __construct($model)
	{
		$this->setModel($model);
	}

	/**
	 * @return mixed
	 */
	public function getModel()
	{
		return $this->model;
	}

	/**
	 * @param mixed $model
	 */
	public function setModel($model)
	{
		$this->model = $model;
	}
}

