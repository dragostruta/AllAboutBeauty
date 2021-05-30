<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\EmployeeInformation;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    private $programHours = ['08', '09', '10', '11', '12', '13', '14', '15'];
    private $programMinutes = ['00', '30'];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getProgram($hours, $minutes, $minus = null)
    {
        $result = [];
        foreach ($hours as $hour){
            if ($minus === null) {
                $result[] = $hour . ':' . $minutes[0];
                $result[] = $hour . ':' . $minutes[1];
            } else {
                $flagHourFix = false;
                $flagHourHalf = false;
                foreach ($minus as $value){
                    if ($value === $hour . ':' . $minutes[0].':00'){
                        $flagHourFix = true;
                    }
                    if ($value === $hour . ':' . $minutes[1].':00'){
                        $flagHourHalf = true;
                    }
                }
                if ($flagHourFix === false){
                    $result[] = $hour . ':' . $minutes[0];
                }
                if ($flagHourHalf === false){
                    $result[] = $hour . ':' . $minutes[1];
                }
            }
        }

        return $result;
    }

    public function getAllAvailableHoursByDate(Request $request){
        $date = $request->get('date');
        $employeeInformationId = $request->get('employeeId');
        $appointmentsByDate = DB::table('appointments')
            ->where('appointment_date', 'like','%'.$date.'%')
            ->where('employee_information_id', '=', $employeeInformationId)
            ->get();

        if (count($appointmentsByDate) === 0){
            return response()->json(['status' => 200, 'hours' => $this->getProgram($this->programHours, $this->programMinutes)]);
        }
        $time = [];
        foreach ($appointmentsByDate as $appointment){
            $time[] = explode(' ', $appointment->appointment_date)[1];
        }

        return response()->json(['status' => 200, 'hours' => $this->getProgram($this->programHours, $this->programMinutes, $time)]);
    }

    public function createAppointment(Request $request){
        $salonId = $request->get('salonId');
        $serviceId = $request->get('serviceId');
        $employeeId = $request->get('employeeId');
        $date = $request->get('date');
        $userId = Auth::user()->id;

        Appointment::create([
            'user_id' => $userId,
            'salon_id' => $salonId,
            'service_id' => $serviceId,
            'employee_information_id' => $employeeId,
            'appointment_date' => $date
        ]);
        return response()->json(['status' => 200]);
    }

    public function getAllAppointmentsByUserId(){
        $appointments = Appointment::where('user_id', '=', Auth::user()->id)->get();
        $appointments = $appointments->toArray();
        $appointments = array_map(function ($element){
            $employeeInformation = EmployeeInformation::where('id', '=', $element['employee_information_id'])->first();
            $employeeInformationUser = User::where('id', '=',$employeeInformation->user_id)->first();
            $date = explode(':',$element['appointment_date']);
            $service = Service::where('id', '=', $element['service_id'])->first();
            return [
                'employee' => $employeeInformationUser->firstname.' '.$employeeInformationUser->lastname,
                'service' => $service,
                'date' => $date[0].':'.$date[1],
                ];
        }, $appointments);
        return response()->json(['status' => 200, 'appointments' => $appointments]);
    }

    public function getAllAppointmentsByEmployeeId(){
        $employee = EmployeeInformation::query()->where('user_id', '=', Auth::user()->id)->first();
        $appointments = Appointment::where('employee_information_id', '=', $employee->id)->get();
        $appointments = $appointments->toArray();
        $appointments = array_map(function ($element){
            $customerUser = User::where('id', '=',$element['user_id'])->first();
            $date = explode(':',$element['appointment_date']);
            $service = Service::where('id', '=', $element['service_id'])->first();
            return [
                'customer' => $customerUser->firstname.' '.$customerUser->lastname,
                'service' => $service,
                'date' => $date[0].':'.$date[1],
            ];
        }, $appointments);
        return response()->json(['status' => 200, 'appointments' => $appointments]);
    }
    public function getAllAppointmentsBySalonId(Request $request){
        $appointments = Appointment::where('salon_id', '=', $request->get('salon_id'))->get();
        $appointments = $appointments->toArray();
        $appointments = array_map(function ($element){
            $customerUser = User::where('id', '=',$element['user_id'])->first();
            $employee = EmployeeInformation::query()->where('id', '=', $element['employee_information_id'])->first();
            $employeeUserInfo = User::query()->where('id', '=', $employee->user_id)->first();
            $date = explode(':',$element['appointment_date']);
            $service = Service::where('id', '=', $element['service_id'])->first();
            return [
                'customer' => $customerUser->firstname.' '.$customerUser->lastname,
                'employee' => $employeeUserInfo->firstname.' '.$employeeUserInfo->lastname,
                'service' => $service->name,
                'servicePrice' => $service->price,
                'date' => $date[0].':'.$date[1],
            ];
        }, $appointments);
        return response()->json(['status' => 200, 'appointments' => $appointments]);
    }

}
