<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function signin(Request $request)
    {


        // dd($request->all());
        // validasi

        $this->validate($request, [
            'emp_id' => 'required|max:15',
            'password' => 'required|min:5',
            // '_token' => 'required'
        ]);

        // proses signin
        if (Auth::attempt($request->only('emp_id', 'password'))) {
            return redirect('/dashboard');
        }
        return redirect('/')->with('alert', 'Please Check your ID and Password!');
        // ->with('alert', 'Failed! Please Check Your ID or Password!');
    }

    public function signout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logout Success!');
    }
}
