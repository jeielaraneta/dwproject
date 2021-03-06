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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/enrollment', 'EnrollmentController@index')->name('enrollment');

Route::get('/enrollment-data', 'EnrollmentController@showEnrollmentData')->name('enrollment-data');

Route::get('/employee', 'EmployeeController@index')->name('employee');

Route::get('/employee-data', 'EmployeeController@showEmployeeData')->name('employee-data');

Route::get('/budget', 'budgetAllocationController@index')->name('budget');

Route::get('/budget-data', 'budgetAllocationController@showBudgetAllocationData')->name('budget-data');

Route::get('/research', 'ResearchController@index')->name('research');

Route::get('/research-data', 'ResearchController@showResearchData')->name('budget-data');
