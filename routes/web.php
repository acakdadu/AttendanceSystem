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
Route::get('/', 'userController@signin')->name('signin');
// Sign In Method
Route::post('/', 'authController@signin');
Route::get('/signout', 'authController@signout')->middleware('auth');


// MiddleWare auth for Security
Route::group(['MiddleWare' => ['auth']], function () {
    // dashboard
    Route::get('/dashboard', 'userController@dashboard');
    // Data
    Route::get('/dashboard/employees', 'userController@employees');
});
