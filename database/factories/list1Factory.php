<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\list1;
use Faker\Generator as Faker;

$factory->define(list1::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
    ];
});
