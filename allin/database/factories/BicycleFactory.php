<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bicycle;
use Faker\Generator as Faker;

$factory->define(Bicycle::class, function (Faker $faker) {
    return [
        'person_id' => null,
        'brand'     => $faker->word,
        'model'     => $faker->word,
        'color'     => $faker->hexColor,
        'price'     => $faker->randomFloat(2, 100, 1000), // Gera um preço aleatório entre 100 e 1000 com duas casas decimais
        'image'     => null
    ];
});
