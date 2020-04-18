<?php

use Illuminate\Support\Facades\Route;

// Welcome -> default signin
Route::get('/', 'authController@sign')->name('login');
// Sign In Method
Route::post('/', 'authController@signin');
Route::get('/signout', 'authController@signout')->middleware('auth');

// generate password to emp_id
Route::get('/genpass', 'userController@generate');


Route::group(['middleware' => 'auth'], function () {
    // dashboard
    Route::get('/dashboard', 'userController@dashboard');
    // dashboard detail team
    Route::get('/dashboard/healthempdetail/{call}', 'userController@healthempdetail');
    // Data
    Route::get('/dashboard/employees', 'userController@employees');
    // Data
    Route::get('/dashboard/export', 'userController@export');
});
