<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{


    public function dashboard()
    {
        $totalemployee = User::all();
        return view('/dashboard', (['totalemp' => $totalemployee]));
    }

    public function employees()
    {
        $employee = User::all();
        return view('/employees', (['dataemp' => $employee]));
    }


}
