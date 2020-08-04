<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Mall\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'is_active' => $faker->boolean(),
        'description'=>$faker->sentence()
    ];
});


$factory->define(\App\Models\Mall\Quote::class, function (Faker $faker) {
    return [
        'product_id' => $faker->randomNumber(),
        'ip'=>$faker->ipv4,
        'username'=>$faker->name(),
        'email' => $faker->email,
        'mobile' => $faker->phoneNumber,
        'remark'  => $faker->text
    ];
});

