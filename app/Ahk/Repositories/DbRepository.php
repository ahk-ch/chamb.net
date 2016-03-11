<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace App\Ahk\Repositories;


/**
 * Class DbRepository
 *
 * @package App\Ahk\Repositories
 */
abstract class DbRepository
{
	/**
	 * Eloquent model
	 */
	private $model;
	/**
	 * Builder
	 */
	private $builder;

	/**
	 * @param $model
	 */
	function __construct($model)
	{
		$this->setModel($model);
	}

	/**
	 *
	 */
	public function get()
	{
		$this->getModel()->get();
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

	/**
	 * @return mixed
	 */
	public function getBuilder()
	{
		return $this->builder;
	}

	/**
	 * @param mixed $builder
	 */
	public function setBuilder($builder)
	{
		$this->builder = $builder;
	}
}

