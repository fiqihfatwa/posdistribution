<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'nik' => $faker->word,
        'gender' => $faker->word,
        'address' => $faker->text,
        'phone' => $faker->word,
        'email' => $faker->word,
        'password' => $faker->word,
        'created_by' => $faker->word,
        'role_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
