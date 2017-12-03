<?php

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

$factory->define(TodoList\Todo::class, function (Faker $faker) {
    static $password;

    return [
        'titulo' => $faker->name,
        'descricao' => $faker->sentence,
        //ranging from next week ending in 1 month
        'vencimento' => $faker->dateTimeBetween('+1 week', '+1 month')
    ];
});