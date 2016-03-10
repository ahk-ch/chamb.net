<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since  10/03/16
 */

namespace integration\app\Ahk\Repositories\Decision;


use App\Ahk\Decision;
use App\Ahk\File;
use App\Ahk\Repositories\Decision\DbDecisionRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

class DbDecisionRepositoryTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_assigns_file_to_decision()
	{
		$dbDecisionRepository = new DbDecisionRepository();

		$file = factory(File::class)->create();

		$decision = factory(Decision::class)->create();

		$this->assertNotEquals(
			array_only($file->toArray(), $file->getFillable()),
			array_only($decision->file->toArray(), $file->getFillable())
		);

		$dbDecisionRepository->assignFile($decision, $file);

		$this->assertSame(
			array_only($file->toArray(), $file->getFillable()),
			array_only($decision->file->toArray(), $file->getFillable())
		);
	}

	/** @test */
	public function it_returns_all_decisions()
	{
		$dbDecisionRepository = new DbDecisionRepository();

		$this->assertCount(0, $dbDecisionRepository->all());

		$actualEvents = factory(Decision::class, 2)->create();

		$expectedDecisions = $dbDecisionRepository->all();

		$this->assertSame(2, $expectedDecisions->count());

		$this->assertSame(
			array_only($expectedDecisions->toArray(), $expectedDecisions[0]->getFillable()),
			array_only($actualEvents->toArray(), $expectedDecisions[0]->getFillable()));

	}
}

