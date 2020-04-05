<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Categories;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Categories::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'sort_order' => $faker->unique()->randomDigit,
        'parent' => 0,
        'banner' => $faker->imageUrl($width = 200, $height = 200),
    ];
});
