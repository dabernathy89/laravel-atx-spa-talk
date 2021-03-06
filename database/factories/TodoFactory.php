<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'title' => ucfirst(implode(' ', $faker->words(3))),
        'completed' => $faker->boolean,
    ];
});
