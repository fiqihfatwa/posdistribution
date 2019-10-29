<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Transaction_item;
use Faker\Generator as Faker;

$factory->define(Transaction_item::class, function (Faker $faker) {

    return [
        'license_id' => $faker->word,
        'transaction_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
