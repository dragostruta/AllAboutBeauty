<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeInformationController extends Controller
{
    public function create()
    {
        return view('employeeInformation/create');
    }

    public function show($id){
        $employeeInformation = DB::table('employee_information')->where('salon_id', $id)->get();

        $resultArray = [];
        foreach ($employeeInformation as $information){
            $user =  DB::table('users')->where('id', $information->id)->first();
            $resultArray[] = [
              'id' => $information->id,
              'firstname' => $user->firstname,
              'lastname' => $user->lastname,
            ];
        }

        return response()->json(['status' => 200, 'employees' => $resultArray]);
    }
}
