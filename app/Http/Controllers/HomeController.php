<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\EmployeeInformation;
use App\Providers\RouteServiceProvider;
use App\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
                case 'employee':
                    return redirect('dashboard');
                case 'admin':
                    return redirect('admin');
            }
        }

        $salons = Salon::where('city', '=', 'Cluj-Napoca')->get();
        $appointments = Appointment::where('user_id', '=', Auth::user()->id)->get();
        return view('home', ['salons' => $salons, 'appointmentCount' => count($appointments)]);
    }
}
