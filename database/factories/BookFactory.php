<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'code' => str_random(5),
        'title' => $faker->name,
        'floor' => $faker->numberBetween(1, 3),
        'shelf' => $faker->numberBetween(1, 20),
    ];
});
