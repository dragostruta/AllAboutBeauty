<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
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

    public function create()
    {
        return view('service/create');
    }

    public function show($id){
        $employeeInformationServices = DB::table('employee_information_service')->where('employee_information_id', $id)->get();

        $resultArray = [];
        foreach ($employeeInformationServices as $informationService){
            $service = DB::table('services')->where('id', $informationService->service_id)->first();
            $resultArray[] = [
                'id' => $service->id,
                'name' => $service->name
            ];
        }

        return response()->json(['status' => 200, 'services' => $resultArray]);
    }
}
