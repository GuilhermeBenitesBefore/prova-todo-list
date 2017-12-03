<?php

use Faker\Generator as Faker;


$factory->define(TodoList\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
    ];
});
