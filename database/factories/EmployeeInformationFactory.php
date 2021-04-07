<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EmployeeInformation;
use App\Salon;
use App\Service;
use App\User;
use Faker\Generator as Faker;

$factory->define(EmployeeInformation::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
        'salon_id' => factory(Salon::class)->create()->id,
        'address' => $faker->address,
        'city' => 'Cluj-Napoca',
        'phone_number' => $faker->phoneNumber,
    ];
});
