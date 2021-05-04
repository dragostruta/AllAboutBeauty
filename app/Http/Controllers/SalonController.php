<?php

namespace App\Http\Controllers;

use App\SalonRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalonController extends Controller
{
    public function request()
    {
        return view('salon.request');
    }

    public function process(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $city = $request->get('city');
        $address = $request->get('address');
        $phoneNumber = $request->get('phone_number');
        $description = $request->get('description');
        $salons = DB::table('salon_requests')->where('name', '=',$name)->where('address','=' ,$address)->get();
        if ($salons){
            return redirect('/request');
        }
        SalonRequests::create([
            'name' => $name,
            'email' => $email,
            'city' => $city,
            'address' => $address,
            'phone_number' => $phoneNumber,
            'description' => $description
        ]);

        return redirect('/');
    }
}
