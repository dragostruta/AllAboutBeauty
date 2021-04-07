<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
use App\EmployeeInformation;
use App\Salon;
use App\Service;
use App\User;
use Faker\Generator as Faker;

$factory->define(Appointment::class, function (Faker $faker) {
    return [
        'appointment_date' => $faker->date('Y-m-d H:i', now()),
        'employee_information_id' => factory(EmployeeInformation::class)->create()->id,
        'service_id' => factory(Service::class)->create()->id,
        'user_id' => factory(User::class)->create()->id,
        'salon_id' => factory(Salon::class)->create()->id,
    ];
});
