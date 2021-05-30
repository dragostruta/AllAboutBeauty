<?php

namespace App\Http\Controllers;

use App\EmployeeInformation;
use App\Salon;
use App\Service;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $salons = Salon::query()->get()->toArray();
        $salons = array_map(function($salon){
           $employees = EmployeeInformation::query()
               ->where('employee_information.salon_id','=', $salon['id'])
               ->get();
           $services = [];
           foreach ($employees as $employee){
               $services[] = $employee->services()->get();
           }
           $salon['services'] = $services;
           return $salon;
        }, $salons);
        return view('welcome', ['salons' => $salons]);
    }
}
