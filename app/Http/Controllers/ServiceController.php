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

    public function deleteDuplicates($array){
        $resultArray = [];

        foreach ($array as $item){
            $flag = false;
            foreach ($resultArray as $element){
                if (($item['id'] == $element['id']) || ($item['name'] == $element['name'])){
                    $flag = true;
                }
            }
            if ($flag == false) {
                $resultArray[] = $item;
            }
        }

        return $resultArray;
    }

    public function getAllServicesBySalon(Request $request){
        $salonId = $request->get('salonId');
        $employeeInformation = DB::table('employee_information')->where('salon_id', $salonId)->get();
        $resultArray = [];

        foreach ($employeeInformation as $information){
            $employeeInformationService = DB::table('employee_information_service')->where('employee_information_id', $information->id)->get();
            foreach ($employeeInformationService as $item) {
                $service = DB::table('services')->where('id', $item->service_id)->first();
                $resultArray[] = [
                    'id' => $service->id,
                    'name' => $service->name
                ];
            }
        }

        return response()->json(['status' => 200, 'services' => $this->deleteDuplicates($resultArray)]);
    }
}
