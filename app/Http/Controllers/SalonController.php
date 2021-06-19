<?php

namespace App\Http\Controllers;

use App\Review;
use App\SalonRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalonController extends Controller
{
    public function request()
    {
        return view('salon.request');
    }

    public function salonRequestSuccess(){
        return view('messages.thank-you');
    }

    public function process(Request $request)
    {
        $firstname = $request->get('firstname');
        $lastname = $request->get('lastname');
        $name = $request->get('name');
        $email = $request->get('email');
        $city = $request->get('city');
        $address = $request->get('address');
        $phoneNumber = $request->get('phone_number');
        $description = $request->get('description');
        $salons = SalonRequests::query()->where('name', '=',$name)->where('address','=' ,$address)->get();
        if (count($salons) !== 0){
            return redirect('/request');
        }
        SalonRequests::create([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'name' => $name,
            'email' => $email,
            'city' => $city,
            'address' => $address,
            'phone_number' => $phoneNumber,
            'description' => $description
        ]);

        return redirect('/salonRequestSuccess');
    }

    public function showSalonRequests(Request $request){
        $salonRequests = SalonRequests::query()->get();
        return response()->json(['salonsRequests' => $salonRequests]);
    }

    public function processRating(Request $request){
        $salonId = $request->get('salon_id');
        $rating = $request->get('rating');

        $review = Review::create([
            'name' => 'Star',
            'salon_id' => $salonId,
            'description' => 'Star Rating',
            'rating' => $rating
        ]);

        return response()->json(['status' => 200, 'review' => $review]);
    }
}
