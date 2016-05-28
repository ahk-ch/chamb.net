<?php

use App\Ahk\File;
use App\Ahk\Storage\FilesStorage;
use Illuminate\Support\Facades\Storage;

$factory->define(File::class, function (Faker\Generator $faker) {
    $fileWithPrimaryData = factory(File::class, 'without_storage')->make();
    $storageLocation = FilesStorage::getFilesDirectory();
    $clientOriginalName = $faker->name.$faker->fileExtension;
    $tempFilePath = file_get_contents(storage_path('app/testing/dummy_logo.png'));
    $fileLocation = $storageLocation.$clientOriginalName;

    Storage::put($fileLocation, $tempFilePath);

    return array_merge($fileWithPrimaryData->toArray(), [
        'path'                 => $fileLocation,
        'client_original_name' => $clientOriginalName,
    ]);
});

$factory->defineAs(File::class, 'without_storage', function (Faker\Generator $faker) {
    $name = $faker->unique()->name;
    $clientOriginalName = "{$faker->name}.{$faker->fileExtension}";
    $storageLocation = FilesStorage::getFilesDirectory();
    $fileLocation = $storageLocation.$clientOriginalName;

    return [
        'name'                 => $name,
        'path'                 => $fileLocation,
        'description'          => $faker->paragraph(),
        'client_original_name' => $clientOriginalName,
    ];
});
