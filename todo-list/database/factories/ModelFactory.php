<?php

use App\Todo;
use App\Category;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'id' => 1,
        'title' => $faker->word,
        'description' => $faker->sentence(),
        'deadline' => $faker->date(),
        'category_id' => 1
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'id' => 1,
        'name' => $faker->word
    ];
});
