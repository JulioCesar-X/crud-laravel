<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Player;
use Faker\Generator as Faker;

$factory->define(Player::class, function (Faker $faker) {
    return [
        "name"          => $faker->name,
        "address_id"    => rand(1,10),
        "description"   => $faker->text,
        "retired"       => $faker->boolean
    ];
});
