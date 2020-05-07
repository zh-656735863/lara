<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\list3;
use Faker\Generator as Faker;

$factory->define(list3::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
    ];
});
