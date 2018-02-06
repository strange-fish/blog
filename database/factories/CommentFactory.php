<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
      "content" => $faker->words(10, true),
      'author_id' => random_int(1, 50),
      'article_id' => random_int(10, 60),
    ];
});
