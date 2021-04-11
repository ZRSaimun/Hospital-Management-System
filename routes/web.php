<?php

use Faker\Guesser\Name;
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

// Route::get('/', function () {
//     return view('frontend.home');
// });

Route::get('/', 'App\Http\Controllers\FrontEndController@homePage');
//P
//Route::resource('patient', 'App\Http\Controllers\PatientController');
Route::get('patient/{id}', 'App\Http\Controllers\PatientController@index')->name('index.patient');
Route::post('patient-store', 'App\Http\Controllers\PatientController@store')->name('store.patient');
//Route::post('patient', 'App\Http\Controllers\FrontEndController@store')->name('appointment.store');

//Route::get('dashboard', 'Auth\RegisterController@showDashboard')->name('user.dashboard');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * For Department
 */
Route::resource('department', 'App\Http\Controllers\DepartmentController');
Route::get('department-edit/{id}', 'App\Http\Controllers\DepartmentController@edit')->name('edit.department');
Route::post('department-update}', 'App\Http\Controllers\DepartmentController@update')->name('update.department');
Route::get('department-unpublished/{id}', 'App\Http\Controllers\DepartmentController@unpublishedDepartment')->name('department.unpublished');
Route::get('department-published/{id}', 'App\Http\Controllers\DepartmentController@publishedDepartment')->name('department.published');
/**
 * For Doctor
 */
Route::resource('doctor', 'App\Http\Controllers\DoctorController');
Route::get('doctor-unpublished/{id}', 'App\Http\Controllers\DoctorController@unpublishedDoctor')->name('doctor.unpublished');
Route::get('doctor-published/{id}', 'App\Http\Controllers\DoctorController@publishedDoctor')->name('doctor.published');
Route::get('doctor-edit/{id}', 'App\Http\Controllers\DepartmentController@edit')->name('edit.doctor');
Route::post('doctor-update}', 'App\Http\Controllers\DepartmentController@update')->name('update.doctor');

/**
 * For Counter
 */
Route::resource('counter', 'App\Http\Controllers\CounterController');
Route::get('counter-confirm/{id}', 'App\Http\Controllers\CounterController@confirmAppointment')->name('counter.confirm');
Route::get('counter-cancel/{id}', 'App\Http\Controllers\CounterController@cancelAppointment')->name('counter.cancel');
//Route::get('counter-unpaid/{id}', 'App\Http\Controllers\CounterController@unpaidAppointment')->name('counter.unpaid');
Route::get('counter-paid/{id}', 'App\Http\Controllers\CounterController@paidAppointment')->name('counter.paid');



Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'dashboard'], function () {
    Route::get('/', 'DashboardController@dashboardIndex')->name('dash.index');
    Route::get('/patient', 'DashboardController@patientIndex')->name('dash-patient.index');
    Route::get('/check/{id}', 'AppointmentController@checkDoctor')->name('doctor.check');
});

/**
 * Pathology
 */
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'pathology'], function () {
    Route::get('/', 'PathologyController@pathologyIndex')->name('pathology.index');
    Route::get('/test/{id}', 'PathologyController@pathologyTest')->name('pathology.test');
});

/**
 * Test
 */
Route::resource('test', 'App\Http\Controllers\TestController');
Route::get('test-unpublished/{id}', 'App\Http\Controllers\TestController@unpublishedTest')->name('test.unpublished');
Route::get('test-published/{id}', 'App\Http\Controllers\TestController@publishedTest')->name('test.published');



Route::get('test-feeshow', 'App\Http\Controllers\TestController@feeTestShow')->name('test.feeshow');
Route::post('test-fee', 'App\Http\Controllers\TestController@feeTest')->name('test.fee');

Route::get('add-test/{id}', 'App\Http\Controllers\PathologyController@addTestShow')->name('add.test');
//Route::post('add-test', 'App\Http\Controllers\PathologyController@addTestShow')->name('add.test');

/**
 * Test
 */
Route::resource('leave', 'App\Http\Controllers\LeaveController');

Route::resource('asset', 'App\Http\Controllers\AssetController');

Route::resource('adminPanel', 'App\Http\Controllers\AdminController');
Route::get('leave-approve/{id}', 'App\Http\Controllers\AdminController@approveLeave')->name('leave.approve');
Route::get('leave-cancel/{id}', 'App\Http\Controllers\AdminController@cancelLeave')->name('leave.cancel');