<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalonController extends Controller
{
    public function request()
    {
        return view('salon.request');
    }

    public function process()
    {
        dd('test');
    }
}
