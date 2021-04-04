<?php

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
        factory(User::class, 10)->create();
        factory(Service::class, 5)->create();
        factory(Salon::class, 3)->create();
        factory(EmployeeInformation::class, 5)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
