<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('employee','apiController@index');
Route::get('employee/{emp_id}', 'apiController@show');
Route::post('employee/addnew', 'apiController@store');
Route::post('employee/update/{emp_id}', 'apiController@update');
Route::post('employee/delete/{emp_id}', 'apiController@destroy');
