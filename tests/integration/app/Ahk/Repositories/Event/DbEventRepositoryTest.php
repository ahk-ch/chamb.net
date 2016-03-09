<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 09/03/16
 */

namespace integration\app\Ahk\Repositories\Event;

use App\Ahk\Event;
use App\Ahk\Repositories\Event\DbEventRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

class DbEventRepositoryTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_returns_all_events()
	{
		$dbEventRepository = new DbEventRepository();

		$this->assertCount(0, $dbEventRepository->all());

		$actualEvents = factory(Event::class, 2)->create();

		$expectedEvents = $dbEventRepository->all();

		$this->assertSame(2, $expectedEvents->count());

		$this->assertSame(
			array_only($expectedEvents->toArray(), $expectedEvents[0]->getFillable()),
			array_only($actualEvents->toArray(), $expectedEvents[0]->getFillable()));
	}

}