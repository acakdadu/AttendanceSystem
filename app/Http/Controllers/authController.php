<?php


namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class authController extends Controller
{

    public function sign()
    {
        if (Auth::check()) {
            $signout = "<a href='/signout'>Sign out</a>";
            return redirect('/dashboard')->with(['alert', 'Sorry, You already to sign in'], $signout);
        }
        // $corona = Http::get('https://api.kawalcorona.com/indonesia/provinsi')[3];
        $corona = null;
        // dd($corona);
        return view('/signin', compact('corona'));
    }

    public function signin(Request $request)
    {
        // dd($request->all());
        // validasi
        $this->validate($request, [
            'emp_id' => 'required|max:15',
            'password' => 'required|min:5'
        ]);

        if (Auth::attempt($request->only('emp_id', 'password'))) {
            return redirect('/dashboard')->with('success', 'Login Success!');
        }
        return redirect('/')->with('alert', 'Please Check your ID and Password!');
    }

    // Proses Logout
    public function signout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logout Success!');
    }
}
