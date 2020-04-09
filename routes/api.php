<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('employee', 'apiController@index');
Route::get('employee/{emp_id}', 'apiController@show');
Route::post('employee/addnew', 'apiController@store');
Route::post('employee/update/{emp_id}', 'apiController@update');
Route::post('employee/delete/{emp_id}', 'apiController@destroy');
