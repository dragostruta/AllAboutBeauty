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

Route::get('/employee', 'EmployeeInformationController@index')->name('employee.index');
Route::get('/service', 'ServiceController@index')->name('service.index');
Route::get('/salon', 'SalonController@index')->name('salon.index');
Route::get('/request', 'SalonController@request')->name('salon.request');


Route::get('/appointment', 'AppointmentController@index')->name('appointment.index');

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/setup', 'Controller@setup')->name('setup');
Route::get('/adminRequest', 'AdminController@request')->name('admin.request');
Route::get('/adminAppointment', 'AdminController@appointment')->name('admin.appointment');
Route::get('/adminEmployee', 'AdminController@employee')->name('admin.employee');
Route::get('/adminEmployeeInfo', 'AdminController@employeeInfo')->name('admin.employeeInfo');
Route::get('/adminSalonInfo', 'AdminController@salonInfo')->name('admin.salonInfo');
Route::get('/salonRequestSuccess', 'SalonController@salonRequestSuccess')->name('admin.salonRequestSuccess');
