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

Auth::routes();

Route::get('/employeeInformation', 'EmployeeInformationController@index')->name('employeeInformation.index');
//Route::get('/employeeInformation/create', 'EmployeeInformationController@create')->name('employeeInformation.create');
//Route::post('/employeeInformation', 'EmployeeInformationController@store')->name('employeeInformation.store');
//Route::get('/employeeInformation/{employeeInformation}', 'EmployeeInformationController@show')->name('employeeInformation.show');
//Route::get('/employeeInformation/{employeeInformation}/edit', 'EmployeeInformationController@edit')->name('employeeInformation.edit');
//Route::put('/employeeInformation/{employeeInformation}', 'EmployeeInformationController@update')->name('employeeInformation.update');
//Route::delete('/employeeInformation/{employeeInformation}', 'EmployeeInformationController@destroy')->name('employeeInformation.destory');
Route::post('/employeeInformation/getAllEmployeesByService', 'EmployeeInformationController@getAllEmployeesByService')->name('employeeInformation.getAllEmployeesByService');


Route::get('/service', 'ServiceController@index')->name('service.index');
//Route::get('/service/create', 'ServiceController@create')->name('service.create');
//Route::post('/service', 'ServiceController@store')->name('service.store');
//Route::get('/service/{service}', 'ServiceController@show')->name('service.show');
//Route::get('/service/{service}/edit', 'ServiceController@edit')->name('service.edit');
//Route::put('/service/{service}', 'ServiceController@update')->name('service.update');
//Route::delete('/service/{service}', 'ServiceController@destroy')->name('service.destroy');
Route::post('/service/getAllServicesBySalon', 'ServiceController@getAllServicesBySalon')->name('service.getAllServicesBySalon');

Route::get('/salon', 'SalonController@index')->name('salon.index');
//Route::get('/salon/create', 'SalonController@create')->name('salon.create');
//Route::post('/salon', 'SalonController@store')->name('salon.store');
//Route::get('/salon/{salon}', 'SalonController@show')->name('salon.show');
//Route::get('/salon/{salon}/edit', 'SalonController@edit')->name('salon.edit');
//Route::put('/salon/{salon}', 'SalonController@update')->name('salon.update');
//Route::delete('/salon/{salon}', 'SalonController@destroy')->name('salon.destroy');
Route::get('/request', 'SalonController@request')->name('salon.request');
Route::post('/process', 'SalonController@process')->name('salon.process');

Route::get('/appointment', 'AppointmentController@index')->name('appointment.index');
//Route::get('/appointment/create', 'AppointmentController@create')->name('appointment.create');
//Route::post('/appointment', 'AppointmentController@store')->name('appointment.store');
//Route::get('/appointment/{appointment}', 'AppointmentController@show')->name('appointment.show');
//Route::get('/appointment/{appointment}/edit', 'AppointmentController@edit')->name('appointment.edit');
//Route::put('/appointment/{appointment}', 'AppointmentController@update')->name('appointment.update');
//Route::delete('/appointment/{appointment}', 'AppointmentController@destroy')->name('appointment.destroy');
Route::post('/appointment/getAllAvailableHoursByDate', 'AppointmentController@getAllAvailableHoursByDate')->name('appointment.getAllAvailableHoursByDate');
Route::post('/appointment/createAppointment', 'AppointmentController@createAppointment')->name('appointment.createAppointment');
Route::get('/appointment/getAllAppointmentsByUserId', 'AppointmentController@getAllAppointmentsByUserId')->name('appointment.getAllAppointmentsByUserId');
Route::get('/appointment/getAllAppointmentsByEmployeeId', 'AppointmentController@getAllAppointmentsByEmployeeId')->name('appointment.getAllAppointmentsByEmployeeId');

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/adminRequest', 'AdminController@request')->name('admin.request');
