<?php

use Faker\Generator as Faker;
use App\Role;

$factory->define(Role::class, function (Faker $faker) {
    $roles = ['prof' => 'professor'];

    $role = $faker->randomElement($roles);

    return [
        'name' => array_search($role, $roles),
        'display_name' => $role,
        'description' => $faker->sentence,
    ];
});
