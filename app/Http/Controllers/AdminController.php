<?php

namespace App\Http\Controllers;

use App\Appointment;
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

class AdminController extends Controller
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
        return view('admin');
    }

    public function request(){
        $salonRequests = SalonRequests::query()->where('status', '=', 'new')->skip(0)->take(10)->get();
        return view('admin.adminRequest', ['salonRequests' => $salonRequests]);
    }

    public function acceptSalonRequest(Request $request){
        $email = $request->get('email');
        $id = $request->get('id');

        $salonRequest = SalonRequests::query()->where('id', '=', $id)->first();

        $user = User::query()->where('email', '=', $email)->where('role', '=', 'manager')->first();
        if (!$user){
            $user = User::create([
                'firstname' => $salonRequest->name,
                'lastname' => $salonRequest->name,
                'email' => $email,
                'password' => Hash::make('test'),
                'role' => 'manager',
            ]);

            event(new Registered($user));
        }

        $salon = Salon::create([
            'name' => $salonRequest->name,
            'address' => $salonRequest->address,
            'city' => $salonRequest->city,
            'user_id' => $user->id,
            'description' => $salonRequest->description,
        ]);

        $salonRequest->status = 'approved';
        $salonRequest->save();

        return response()->json($salon);
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
        $salons = Salon::query()->get();
        return view('admin.adminAppointments', ['salons' => $salons]);
    }

    public function employee(){
        $salons = Salon::query()->get();
        return view('admin.adminEmployee', ['salons' => $salons]);
    }
    public function employeeInfo(){
        return view('admin.adminEmployeeInfo');
    }
    public function salonInfo(){
        return view('admin.adminSalonInfo');
    }
}
