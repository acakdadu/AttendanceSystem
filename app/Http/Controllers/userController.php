<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class userController extends Controller
{

    // display view with data corona
    public function signin()
    {
        $corona = Http::get('https://api.kawalcorona.com/indonesia/provinsi')[3];
        // dd($corona);
        return view('/signin', compact('corona'));
    }

    public function dashboard()
    {
        return view('/dashboard');
    }

    public function employees()
    {
        return view('/employees');
    }
}
