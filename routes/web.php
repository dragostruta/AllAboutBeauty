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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/information', 'EmployeeInformationController@index')->name('information.index');
Route::get('/information/create', 'EmployeeInformationController@create')->name('information.create');
Route::post('/information', 'EmployeeInformationController@store')->name('information.store');
Route::get('/information/{information}', 'EmployeeInformationController@show')->name('information.show');
Route::get('/information/{information}/edit', 'EmployeeInformationController@edit')->name('information.edit');
Route::put('/information/{information}', 'EmployeeInformationController@update')->name('information.update');
Route::delete('/information/{information}', 'EmployeeInformationController@destroy')->name('information.destory');

Route::get('/service', 'ServiceController@index')->name('service.index');
Route::get('/service/create', 'ServiceController@create')->name('service.create');
Route::post('/service', 'ServiceController@store')->name('service.store');
Route::get('/service/{service}', 'ServiceController@show')->name('service.show');
Route::get('/service/{service}/edit', 'ServiceController@edit')->name('service.edit');
Route::put('/service/{service}', 'ServiceController@update')->name('service.update');
Route::delete('/service/{service}', 'ServiceController@destroy')->name('service.destroy');

Route::get('/salon', 'SalonController@index')->name('salon.index');
Route::get('/salon/create', 'SalonController@create')->name('salon.create');
Route::post('/salon', 'SalonController@store')->name('salon.store');
Route::get('/salon/{salon}', 'SalonController@show')->name('salon.show');
Route::get('/salon/{salon}/edit', 'SalonController@edit')->name('salon.edit');
Route::put('/salon/{salon}', 'SalonController@update')->name('salon.update');
Route::delete('/salon/{salon}', 'SalonController@destroy')->name('salon.destroy');

Route::get('/appointment', 'AppointmentController@index')->name('appointment.index');
Route::get('/appointment/create', 'AppointmentController@create')->name('appointment.create');
Route::post('/appointment', 'AppointmentController@store')->name('appointment.store');
Route::get('/appointment/{appointment}', 'AppointmentController@show')->name('appointment.show');
Route::get('/appointment/{appointment}/edit', 'AppointmentController@edit')->name('appointment.edit');
Route::put('/appointment/{appointment}', 'AppointmentController@update')->name('appointment.update');
Route::delete('/appointment/{appointment}', 'AppointmentController@destroy')->name('appointment.destroy');

Route::get('/home', 'HomeController@index')->name('home');
