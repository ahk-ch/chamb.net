<?php

use App\Ahk\Company;
use App\Ahk\Decision;
use App\Ahk\File;
use App\Ahk\User;

$factory->define(Decision::class, function (Faker\Generator $faker) {
    return [
        'name'          => $faker->unique()->name,
        'description'   => $faker->paragraph(),
        'decision_date' => $faker->date(),
        'creator_id'    => factory(User::class)->create()->id,
        'file_id'       => factory(File::class)->create()->id,
        'company_id'    => factory(Company::class)->create()->id,
    ];
});

$factory->defineAs(Decision::class, 'without_company', function (Faker\Generator $faker) {
    return [
        'name'          => $faker->unique()->name,
        'description'   => $faker->paragraph(),
        'decision_date' => $faker->date(),
        'creator_id'    => factory(User::class)->create()->id,
        'file_id'       => factory(File::class)->create()->id,
    ];
});
