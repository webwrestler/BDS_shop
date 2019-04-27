<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Product::class, function (Faker $faker) {
    return [
        'name'     => $faker->title,
        'price'    => $faker->randomNumber($nbDigits=3),
        'quantity' => $faker->randomNumber($nbDigits=2)
    ];
});
