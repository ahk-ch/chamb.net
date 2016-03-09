<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 09/03/16
 */

namespace integration\app\Ahk\Repositories\Event;

use App\Ahk\Event;
use App\Ahk\File;
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

	/** @test */
	public function it_assigns_files_to_event()
	{
		$dbEventRepository = new DbEventRepository();
		$event = factory(Event::class)->create();
		$expectedFile = factory(File::class)->create();

		$this->assertCount(0, $event->files);
		$event = $dbEventRepository->assignFiles($event, [$expectedFile]);
		$this->assertCount(1, $event->files()->get());
		$this->assertSame(
			$event->files()->get()->get(0)->name,
			$expectedFile->name);

		$expectedFile = factory(File::class)->create();
		$expectedFile1 = factory(File::class)->create();

		$event = $dbEventRepository->assignFiles($event, [$expectedFile, $expectedFile1]);
		$this->assertCount(3, $event->files()->get());
		$this->assertSame(
			$event->files()->get()->get(2)->name,
			$expectedFile1->name);
	}

}