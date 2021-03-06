<?php

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

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::resource('employees', 'EmployeesController');

Route::resource('attendance', 'AttendanceController');

Route::get('/attendance', 'AttendanceController@index');

Route::post('/attendance', 'AttendanceController@upload');

Route::get('/attendance/{attendance_csv}/import', 'AttendanceController@import');

Route::resource('records', 'RecordsController');    



