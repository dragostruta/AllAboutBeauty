<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\EmployeeInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeInformationController extends Controller
{
    public function getAllEmployeesByService(Request $request){
        $salonId = $request->get('salonId');
        $serviceId = $request->get('serviceId');
        $employeeInformationService = DB::table('employee_information_service')
            ->join('employee_information', 'employee_information_service.employee_information_id', '=', 'employee_information.id')
            ->where('employee_information_service.service_id', $serviceId)
            ->where('employee_information.salon_id', $salonId)
            ->select('employee_information.*','employee_information_service.*')
            ->get();


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

    public function getAllEmployeesBySalon(Request $request){
        $salonId = $request->get('salon_id');
        $resultArray = EmployeeInformation::query()
            ->where('salon_id', '=', $salonId)
            ->join('users', 'employee_information.user_id', '=', 'users.id')
            ->select('employee_information.id as employee_information_id', 'employee_information.address', 'employee_information.phone_number', 'users.*')
            ->get()->toArray();

        $resultArray = array_map(function ($employee){
            $earned = 0;
            $appointments = Appointment::query()
                ->where('employee_information_id', '=', $employee['employee_information_id'])
                ->join('services', 'appointments.service_id', '=', 'services.id')
                ->select('appointments.*', 'services.*')
                ->get()->toArray();

            foreach ($appointments as $appointment){
                $earned += $appointment['price'];
            }

            $employee['earned'] = $earned;

            return $employee;

        }, $resultArray);

        return response()->json(['status' => 200, 'employees' => $resultArray]);
    }
}
