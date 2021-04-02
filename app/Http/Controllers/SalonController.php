<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalonController extends Controller
{
    public function create()
    {
        return view('salon/create');
    }
}
