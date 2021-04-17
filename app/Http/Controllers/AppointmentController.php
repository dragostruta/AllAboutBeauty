<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    private $programHours = ['08', '09', '10', '11', '12', '13', '14', '15'];
    private $programMinutes = ['00', '30'];

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
}
