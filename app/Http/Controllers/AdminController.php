<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.adminRequest');
    }
}
