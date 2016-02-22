<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   20/2/2016
 */

namespace tests\integration\app\Ahk\Repositories\File;

use App\Ahk\File;
use App\Ahk\Repositories\File\DbFileRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Storage;
use tests\TestCase;

class DbFileRepositoryTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_creates_new_file()
	{
		$dbFileRepository = new DbFileRepository();
		$expectedFile = factory(File::class, 'with_primary_data')->make();
		$keys = $expectedFile->getFillable();
		$expectedFileData = array_only($expectedFile->toArray(), $keys);
		$requestData = $expectedFileData;
		$requestData['file_temp_path'] = storage_path('app/testing/dummy_logo.png');

		$this->notSeeInDatabase('files', $expectedFileData);

		$this->assertFalse(Storage::exists($expectedFile->path));

		$this->assertNotFalse(
			$dbFileRepository->store($requestData));

		$this->seeInDatabase('files', $expectedFileData);

		$this->assertTrue(Storage::exists($expectedFile->path));
	}
}