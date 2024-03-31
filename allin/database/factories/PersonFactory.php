<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'country_id' => rand(1,4),
        'first_name' => $faker->firstName,
        'last_name'  => $faker->lastName,
        'birth_date' => $faker->date
    ];
});
