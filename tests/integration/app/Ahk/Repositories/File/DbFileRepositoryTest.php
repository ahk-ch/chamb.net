<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   20/2/2016
 */

namespace tests\integration\app\Ahk\Repositories\File;

use App\Ahk\File;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

class DbFileRepositoryTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_creates_new_file()
	{
		$dbFileRepository = new DbFileRepository();
		$expectedFile = factory(File::class)->create();
		$keys = $expectedFile->getFillable();
		$expectedFileData = array_only($expectedFile->toArray(), $keys);

		$this->assertNotFalse($dbFileRepository->store($expectedFileData));

		$this->assertTrue(Storage)
	}
}