<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\TodoList;
use Faker\Generator as Faker;

$factory->define(TodoList::class, function (Faker $faker) {
    return [
        'title' => ucfirst(implode(' ', $faker->words(3))),
    ];
});
