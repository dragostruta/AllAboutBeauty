<?php

use App\Appointment;
use App\EmployeeInformation;
use App\Salon;
use App\Service;
use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Appointment::class, 1)->create();
        factory(Service::class, 8)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
