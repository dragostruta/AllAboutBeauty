<?php

namespace App\Http\Controllers;

use App\EmployeeInformation;
use App\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
                case 'admin':
                    return redirect('admin');
                case 'manager':
                    return redirect('manager');
            }
        }
        $employee = EmployeeInformation::query()
            ->where('user_id', '=', Auth::user()->id)
            ->first();
        $salon = Salon::query()->where('id', '=', $employee->salon_id)->first();
        return view('dashboard', ['employee' => $employee, 'salon' => $salon]);
    }
}
