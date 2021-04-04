<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    $gender = ['female', 'male'];
    $serviceName = ['tuns', 'machiaj', 'coafat', 'barbierit', 'make-up'];
    return [
        'name' => $serviceName[array_rand($serviceName)],
        'duration' => $faker->numberBetween(0, 480),
        'gender' => $gender[array_rand($gender)],
        'price' => $faker->randomFloat(2,0, 2000)
    ];
});
