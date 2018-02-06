<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(6),
        'content' => $faker->sentence(15),
        'author_id' => $faker->numberBetween(1, 50),
    ];
});
