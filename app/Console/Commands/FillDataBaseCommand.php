<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FillDataBaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:fill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill the Database with data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $employeeList = [
            [
                'manager' => 'Amalia Castaliu',
                'employee' => [
                    [
                        'name' => 'Manolache Alexandra',
                        'service' => [0, 1]
                    ],
                    [
                        'name' => 'Falca Andrei-Ioan',
                        'service' => [1, 2]
                    ]
                ]
            ],
            [
                'manager' => 'Melisa Rusz',
                'employee' => [
                    [
                        'name' => 'Vaum Maria',
                        'service' => [0]
                    ],
                    [
                        'name' => 'Petrascu Amelia-Diana',
                        'service' => [1, 3]
                    ]
                ]
            ]
        ];
        $serviceList = [
            [
                'id' => 0,
                'name' => 'Tuns breton',
                'gender' => 'female',
                'price' => 20
            ],
            [
                'id' => 1,
                'name' => 'Tuns varfuri',
                'gender' => 'female',
                'price' => 25
            ],
            [
                'id' => 2,
                'name' => 'Tuns scurt',
                'gender' => 'female',
                'price' => 30
            ],
        ];
        return 0;
    }
}
