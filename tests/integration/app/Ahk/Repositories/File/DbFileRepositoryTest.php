<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   20/2/2016
 */

namespace tests\integration\app\Ahk\Repositories\File;

use App\Ahk\File;
use App\Ahk\Repositories\File\DbFileRepository;
use App\Ahk\Storage\FilesStorage;
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
		$expectedFileName = 'dummy_logo.png';
		$expectedFilePath = FilesStorage::getFilesDirectory() . $expectedFileName;

		$requestData = array_only($expectedFile->toArray(), $expectedFile->getFillable());

		$requestData[ File::CLIENT_ORIGINAL_NAME ] = $expectedFileName;

		$tempFilePath = [File::TEMPORARY_PATH => storage_path('app/testing/dummy_logo.png')];

		$this->notSeeInDatabase('files', $requestData);

		if ( Storage::exists($expectedFilePath) ) Storage::delete($expectedFilePath);

		$this->assertFalse(Storage::exists($expectedFilePath));

		$this->assertNotFalse($file = $dbFileRepository->store(array_merge($requestData, $tempFilePath)));

		$this->seeInDatabase('files', $requestData + [
				File::PATH => $expectedFilePath,
				File::SLUG => 'dummy-logo-png',
			]);

		$this->assertTrue(Storage::exists($expectedFilePath));
	}

	/** @test */
	public function it_updates_a_file()
	{
		$dbFileRepository = new DbFileRepository();
		$expectedFile = factory(File::class, 'with_primary_data')->make();;
		$expectedClientOriginalName = 'dummy_logo3.png';
		$expectedFilePath = FilesStorage::getFilesDirectory() . $expectedClientOriginalName;
		$expectedTemporaryPath = storage_path('app/testing/dummy_logo.png');

		$requestData[ File::NAME ] = $expectedFile->name;
		$requestData[ File::DESCRIPTION ] = $expectedFile->description;
		$requestData[ File::CLIENT_ORIGINAL_NAME ] = $expectedClientOriginalName;
		$tempFilePath = [File::TEMPORARY_PATH => $expectedTemporaryPath];

		$currentFile = factory(File::class)->create();
		$oldFilePath = $currentFile->path;

		$this->assertTrue(Storage::exists($currentFile->path));
		$this->assertFalse(Storage::exists($expectedFilePath));

		$this->assertNotFalse(
			$dbFileRepository->update($currentFile, array_merge($requestData, $tempFilePath)));

		$this->seeInDatabase('files', [
			File::NAME                 => $expectedFile->name,
			File::DESCRIPTION          => $expectedFile->description,
			File::PATH                 => $expectedFilePath,
			File::CLIENT_ORIGINAL_NAME => $expectedClientOriginalName,
			File::SLUG                 => 'dummy-logo3-png',
		]);

		$this->assertFalse(Storage::exists($oldFilePath));

		$this->assertTrue(Storage::exists($expectedFilePath));
	}
}