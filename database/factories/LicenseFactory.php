<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\License;
use Faker\Generator as Faker;

$factory->define(License::class, function (Faker $faker) {

    return [
        'license_key' => $faker->word,
        'sold_in' => $faker->word,
        'user_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
