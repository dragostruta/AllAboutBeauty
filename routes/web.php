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
Route::get('/request', 'SalonController@request')->name('request');


Route::get('/appointment', 'AppointmentController@index')->name('appointment.index');
Route::post('/admin/acceptSalonRequest', 'AdminController@acceptSalonRequest')->name('admin.acceptSalonRequest');
Route::post('/admin/deleteSalonRequest', 'AdminController@deleteSalonRequest')->name('admin.deleteSalonRequest');
Route::post('/admin/deleteSalon', 'AdminController@deleteSalon')->name('admin.deleteSalon');
Route::post('/admin/exportExcel', 'AdminController@exportExcel')->name('admin.exportExcel');
Route::post('/admin/addEmployee', 'AdminController@addEmployee')->name('admin.addEmployee');
Route::post('/admin/exportEmployeeInfo', 'AdminController@exportEmployeeInfo')->name('admin.exportEmployeeInfo');
Route::post('/admin/exportAppointements', 'AdminController@exportAppointements')->name('admin.exportAppointements');
Route::post('/service/getAllServicesBySalon', 'ServiceController@getAllServicesBySalon')->name('service.getAllServicesBySalon');

Route::get('/manager', 'ManagerController@index')->name('manager');
Route::post('/manager/exportExcel', 'ManagerController@exportExcel')->name('manager.exportExcel');
Route::post('/manager/exportEmployeeInfo', 'ManagerController@exportEmployeeInfo')->name('manager.exportEmployeeInfo');
Route::post('/manager/exportAppointements', 'ManagerController@exportAppointements')->name('manager.exportAppointements');
Route::get('/managerAppointment', 'ManagerController@appointment')->name('manager.appointment');
Route::get('/managerEmployee', 'ManagerController@employee')->name('manager.employee');
Route::get('/managerEmployeeInfo', 'ManagerController@employeeInfo')->name('manager.employeeInfo');

// Appointment //
Route::post('/appointment/getAllAvailableHoursByDate', 'AppointmentController@getAllAvailableHoursByDate')->name('appointment.getAllAvailableHoursByDate');
Route::post('/appointment/createAppointment', 'AppointmentController@createAppointment')->name('appointment.createAppointment');
Route::get('/appointment/getAllAppointmentsByUserId', 'AppointmentController@getAllAppointmentsByUserId')->name('appointment.getAllAppointmentsByUserId');
Route::get('/appointment/getAllAppointmentsByEmployeeId', 'AppointmentController@getAllAppointmentsByEmployeeId')->name('appointment.getAllAppointmentsByEmployeeId');
Route::get('/appointment/getAllAppointmentsBySalonId', 'AppointmentController@getAllAppointmentsBySalonId')->name('appointment.getAllAppointmentsBySalonId');
Route::get('/appointment/getAllAppointmentsBySalonIdAndUserId', 'AppointmentController@getAllAppointmentsBySalonIdAndUserId')->name('appointment.getAllAppointmentsBySalonIdAndUserId');

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/setup', 'Controller@setup')->name('setup');
Route::get('/adminRequest', 'AdminController@request')->name('admin.request');
Route::get('/customerAppointment', 'HomeController@appointment')->name('customer.appointment');
Route::get('/adminAppointment', 'AdminController@appointment')->name('admin.appointment');
Route::get('/adminEmployee', 'AdminController@employee')->name('admin.employee');
Route::get('/adminManager', 'AdminController@manager')->name('admin.manager');
Route::get('/adminEmployeeInfo', 'AdminController@employeeInfo')->name('admin.employeeInfo');
Route::get('/adminSalons', 'AdminController@salons')->name('admin.salon');
Route::get('/salonRequestSuccess', 'SalonController@salonRequestSuccess')->name('admin.salonRequestSuccess');
Route::post('/salonProcessRating', 'SalonController@processRating')->name('salon.processRating');
Route::get('/editUserSuccess', 'HomeController@editUserSuccess')->name('home.editUserSuccess');
Route::get('/editUserFailed', 'HomeController@editUserFailed')->name('home.editUserFailed');
Route::post('/editUser', 'HomeController@editUser')->name('home.editUser');
