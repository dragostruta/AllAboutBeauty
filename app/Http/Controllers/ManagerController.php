<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\EmployeeInformation;
use App\Service;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Events\Registered;
use App\Salon;
use App\SalonRequests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ManagerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if (Auth::user()->role) {
            switch (Auth::user()->role){
                case 'customer':
                    return redirect('home');
                case 'employee':
                    return redirect('dashboard');
            }
        }
        return view('manager');
    }


    public function exportEmployeeInfo(Request $request){
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $salonId = Salon::query()->where('user_id', '=', Auth::user()->id)->first()->id;
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


        $sheet->setCellValue('A1', 'Prenume');
        $sheet->setCellValue('B1', 'Nume de familie');
        $sheet->setCellValue('C1', 'Adresă');
        $sheet->setCellValue('D1', 'Număr de telefon');
        $sheet->setCellValue('E1', 'Venituri (ultimele 30 de zile)');
        $key = 1;
        foreach ($resultArray as $employee){
            $key++;
            $sheet->setCellValue('A'.$key, $employee['firstname']);
            $sheet->setCellValue('B'.$key, $employee['lastname']);
            $sheet->setCellValue('C'.$key, $employee['address']);
            $sheet->setCellValue('D'.$key, $employee['phone_number']);
            $sheet->setCellValue('E'.$key, $employee['earned']);
        }

        $filename = 'employee-info.xlsx';
        $writer = new Xlsx($spreadsheet);
        $writer->save('files/'.$filename);

        return response()->json(['status' => 200, 'path' => 'files/'.$filename, 'name' => $filename]);
    }

    public function exportAppointements(Request $request){
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $salon = Salon::query()
            ->where('user_id', '=', Auth::user()->id)
            ->first();

        $appointments = Appointment::where('salon_id', '=', $salon->id)->get();
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

        $sheet->setCellValue('A1', 'Programare');
        $sheet->setCellValue('B1', 'Angajat');
        $sheet->setCellValue('C1', 'Client');
        $sheet->setCellValue('D1', 'Serviciu');
        $sheet->setCellValue('E1', 'Preț');
        $key = 1;
        foreach ($appointments as $appointment){
            $key++;
            $sheet->setCellValue('A'.$key, $appointment['date']);
            $sheet->setCellValue('B'.$key, $appointment['employee']);
            $sheet->setCellValue('C'.$key, $appointment['customer']);
            $sheet->setCellValue('D'.$key, $appointment['service']);
            $sheet->setCellValue('E'.$key, $appointment['servicePrice']);
        }

        $filename = 'appointment-info.xlsx';
        $writer = new Xlsx($spreadsheet);
        $writer->save('files/'.$filename);

        return response()->json(['status' => 200, 'path' => 'files/'.$filename, 'name' => $filename]);
    }


    public function exportExcel(Request $request){
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $salonRequests = SalonRequests::query()->get();

        $sheet->setCellValue('A1', 'Name');
        $sheet->setCellValue('B1', 'Address');
        $sheet->setCellValue('C1', 'City');
        $sheet->setCellValue('D1', 'Email');
        $sheet->setCellValue('E1', 'Descriptions');
        $sheet->setCellValue('F1', 'Phone Number');
        $sheet->setCellValue('G1', 'Status');
        $key = 1;
        foreach ($salonRequests as $salonRequest){
            $key++;
            $sheet->setCellValue('A'.$key, $salonRequest->name);
            $sheet->setCellValue('B'.$key, $salonRequest->address);
            $sheet->setCellValue('C'.$key, $salonRequest->city);
            $sheet->setCellValue('D'.$key, $salonRequest->email);
            $sheet->setCellValue('E'.$key, $salonRequest->description);
            $sheet->setCellValue('F'.$key, $salonRequest->phone_number);
            $sheet->setCellValue('G'.$key, $salonRequest->status);
        }

        $filename = 'salon-requests.xlsx';
        $writer = new Xlsx($spreadsheet);
        $writer->save('files/'.$filename);

        return response()->json(['status' => 200, 'path' => 'files/'.$filename, 'name' => $filename]);
    }

    public function appointment(){
        $salon = Salon::query()
            ->where('user_id', '=', Auth::user()->id)
            ->first();

        $appointments = Appointment::where('salon_id', '=', $salon->id)->get();
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

        return view('manager.managerAppointments', ['appointments' => $appointments]);
    }

    public function employee(){

        $salon = Salon::query()
            ->where('user_id', '=', Auth::user()->id)
            ->first();

        $resultArray = EmployeeInformation::query()
            ->where('salon_id', '=', $salon->id)
            ->join('users', 'employee_information.user_id', '=', 'users.id')
            ->select('employee_information.id as employee_information_id', 'employee_information.address', 'employee_information.phone_number', 'employee_information.status as employee_status','users.*')
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

        return view('manager.managerEmployee', ['employees' => $resultArray, 'salon'=> $salon]);
    }
    public function employeeInfo(){
        return view('manager.managerEmployeeInfo');
    }
}
