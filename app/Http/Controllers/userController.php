<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{


    public function dashboard()
    {

        $totalemp = User::all();
        return view('/dashboard', (compact('totalemp')));
    }

    public function employees()
    {
        $dataemp = User::with(['Family'])->get();
        $totalfamily = User::with(['Family'])->count();
        // $dataemp = User::all();
        return view('/employees', (compact(['dataemp', 'totalfamily'])));
    }
}
