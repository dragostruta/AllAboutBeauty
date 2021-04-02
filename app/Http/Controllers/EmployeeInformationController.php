<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeInformationController extends Controller
{
    public function create()
    {
        return view('employeeInformation/create');
    }
}
