<?php

use Illuminate\Support\Facades\Route;

// Welcome -> default signin
Route::get('/', 'authController@sign')->name('login');
// Sign In Method
Route::post('/', 'authController@signin');
Route::get('/signout', 'authController@signout')->middleware('auth');


Route::group(['middleware' => 'auth'], function () {
    // dashboard
    Route::get('/dashboard', 'userController@dashboard');
    // Data
    Route::get('/dashboard/employees', 'userController@employees');
    // Data
    Route::get('/dashboard/export', 'userController@export');
});
