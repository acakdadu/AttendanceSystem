<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Welcome -> default signin
Route::get('/', function () {
    return view('signin');
});


// Dashboard 
Route::get('/dashboard', function () {
    return view('dashboard');
});
	// Data
	Route::get('/dashboard/employees', function () {
    return view('employees');
	});

// Sign In Method
Route::get('/', 'userController@signin');
