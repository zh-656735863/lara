<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\list2;
use Faker\Generator as Faker;

$factory->define(list2::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
    ];
});
