<?php

namespace App\Http\Controllers;

use App\EmployeeInformation;
use App\Review;
use App\Salon;
use App\Service;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $salons = Salon::query()
            ->where('salons.status', '=', 'enabled')->get()->toArray();
        $salons = array_map(function($salon){
           $employees = EmployeeInformation::query()
               ->where('employee_information.salon_id','=', $salon['id'])
               ->get();
           $services = [];
           foreach ($employees as $employee){
               $services[] = $employee->services()->get();
           }
           $salon['services'] = $services;
           $reviews = Review::query()
               ->where('reviews.salon_id', '=', $salon['id'])
               ->get();
           $rating = 0;
           foreach ($reviews as $review){
               $rating += $review->rating;
           }
           if (count($reviews) > 0) {
               $rating = round($rating / count($reviews));
           }
           $salon['rating'] = $rating;
           return $salon;
        }, $salons);

        $services = Service::query()->get();
        return view('welcome', ['salons' => $salons, 'services' => $services]);
    }
}
