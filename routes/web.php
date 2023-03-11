<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

//Auth::routes();
Route::group(['middleware'=>['guest']],function(){

	Route::get('/', function()
	{
	return view('auth.login');
	 });

});

Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');

Route::get('registration', 'CustomAuthController@registration')->name('register-user');
Route::post('custom', 'CustomAuthController@customRegistration')->name('custom');

 
  

// Route::resource('earths', 'EarthController');
// Route::get('Print_earth/{id}','EarthController@Print_earth');  

Route::resource('reports', 'ReportsController');

Route::resource('jobs', 'JobController');
Route::resource('degrees', 'DegreeController');
Route::resource('specialties', 'SpecialtyController');   
Route::resource('depts', 'DeptController');
Route::resource('colleges', 'CollegeController'); 
Route::resource('vacations', 'VacationController'); 
Route::resource('leaves', 'LeaveController'); 
Route::post('leaveUpdate', 'LeaveController@leaveUpdate'); 
Route::resource('bonues', 'BonusController'); 
 

Route::post('updatedemission', 'DemissionController@updatedemission')->name('updatedemission'); 

Route::resource('bromotions', 'BromotionController'); 
Route::resource('trainees', 'traineeController'); 
Route::resource('teachers', 'teacherController'); 
Route::resource('salaries', 'SalaryController'); 
Route::resource('payrolls', 'PayrollController'); 
Route::get('getSalaries', 'SalaryController@getSalaries')->name('getSalaries'); 
Route::resource('demissions', 'DemissionController'); 

                                                     


Route::group(['middleware' => ['auth']], function() {
    
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');

});


                             

Route::get('/{page}', 'AdminController@index');