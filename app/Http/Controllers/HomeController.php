<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\EmployeeInformation;
use App\Providers\RouteServiceProvider;
use App\Salon;
use App\SalonRequests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function appointment(){
        $salons = Salon::query()
            ->join('appointments', 'appointments.salon_id', '=', 'salons.id')
            ->where('appointments.user_id', '=', Auth::user()->id)
            ->where('salons.status', '=', 'enabled')
            ->select('salons.*')
            ->get();
        $resultArray = [];
        foreach ($salons as $salon){
            if (empty($resultArray)){
                $resultArray[] = $salon;
            }
            foreach ($resultArray as $result){
                if ($result['name'] === $salon->name){
                    break;
                }
                $resultArray[] = $salon;
            }
        }
        return view('customer.customerAppointments', ['salons' => $resultArray]);
    }

    public function index()
    {
        if (Auth::user()->role) {
            switch (Auth::user()->role){
                case 'employee':
                    return redirect('dashboard');
                case 'admin':
                    return redirect('admin');
                case 'manager':
                    return redirect('manager');
            }
        }

        $salons = Salon::where('city', '=', 'Baia Mare')->where('salons.status', '=', 'enabled')->get();
        $appointments = Appointment::where('user_id', '=', Auth::user()->id)->get();
        return view('home', ['salons' => $salons, 'appointmentCount' => count($appointments)]);
    }

    public function editUserSuccess(){
        return view('messages.thank-you');
    }

    public function editUserFailed(){
        return view('messages.failed');
    }

    public function editUser(Request $request){
        $user = User::query()->where('email', '=', $request->get('email'))->first();
        if ($user){
            if ($request->get('firstname')) {
                $user->firstname = $request->get('firstname');
            }
            if ($request->get('lastname')) {
                $user->lastname = $request->get('lastname');
            }
            if ($request->get('email')) {
                $email = User::query()
                    ->where('email', '=', $request->get('email'))
                    ->where('email', '!=', $user->email)
                    ->first();
                if ($email){
                    return response()->json(['status' => 400]);
                }
                $user->email = $request->get('email');
            }
            if ($request->get('password')){
                $user->password = Hash::make($request->get('password'));
            }
            if ($user->save()) {
                return response()->json(['status' => 200]);
            }
            return response()->json(['status' => 400]);
        }
        return response()->json(['status' => 200]);
    }
}
