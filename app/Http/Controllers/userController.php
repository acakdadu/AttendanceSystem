<?php

namespace App\Http\Controllers;

use App\User;

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
        // $totalfamily = ;
        return view('/employees', (['dataemp' => $employee]));
    }
}
