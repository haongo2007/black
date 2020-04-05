<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Brand;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'sort_order' => $faker->randomDigit,
        'image' => $faker->imageUrl($width = 200, $height = 200),
    ];
});
