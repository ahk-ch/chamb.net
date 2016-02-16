<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/2/2016
 */

namespace tests\integration\app\Ahk\Repositories\Service;

use App\Ahk\Repositories\Service\DbServiceRepository;
use App\Ahk\Service;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

class DbServiceRepositoryTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_returns_services()
	{
		$dbServiceRepository = new DbServiceRepository();

		$this->assertCount(0, $dbServiceRepository->all());

		factory(Service::class, 2)->create();

		$expectedServices = $dbServiceRepository->all();

		$this->assertCount(2, $expectedServices);

		$this->assertSame(
			array_only($expectedServices->toArray(), $expectedServices[0]->getFillable()),
			array_only($expectedServices->toArray(), $expectedServices[1]->getFillable())
		);
	}

}