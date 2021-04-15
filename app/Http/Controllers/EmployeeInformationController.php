<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeInformationController extends Controller
{
    public function getAllEmployeesByService(Request $request){
        $serviceId = $request->get('serviceId');
        $employeeInformationService = DB::table('employee_information_service')->where('service_id', $serviceId)->get();

        $resultArray = [];
        foreach ($employeeInformationService as $informationService){
            $employeeInformation = DB::table('employee_information')->where('id', $informationService->employee_information_id)->first();
            $user =  DB::table('users')->where('id', $employeeInformation->user_id)->first();
            $resultArray[] = [
              'id' => $employeeInformation->id,
              'firstname' => $user->firstname,
              'lastname' => $user->lastname,
            ];
        }

        return response()->json(['status' => 200, 'employees' => $resultArray]);
    }
}
