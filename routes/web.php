<?php
use App\User;
use App\Department;
use App\Setting;
use App\Articale;
use App\Comment;

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


Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cpanal', 'CpanalController@index');

//Users
Route::get('/createUser', 'CpanalController@CreateUser');
Route::post('/createUser', 'CpanalController@CreateUser');

Route::get('/AllUsers', 'CpanalController@AllUsers');
Route::get('/AllUsers/{id}', function($id){
		$user=User::find($id);
		$user->delete();
		return redirect('AllUsers');
	});

Route::get('/EditUser/{id}', 'CpanalController@EditUser');
Route::post('/EditUser/{id}', 'CpanalController@EditUser');

//Departments
Route::get('/AllDepartments', 'CpanalController@AllDepartments');
Route::get('/AllDepartments/{id}', function($id){
		$Department=Department::find($id);
		$Department->delete();
		return redirect('AllDepartments');
	});

Route::get('/newDepartment', 'CpanalController@CreateDepartment');
Route::post('/newDepartment', 'CpanalController@CreateDepartment');

Route::get('/EditDepartment/{id}', 'CpanalController@EditDepartment');
Route::post('/EditDepartment/{id}', 'CpanalController@EditDepartment');

//Settings
Route::get('/Setting', 'CpanalController@Setting');
Route::post('/Setting', 'CpanalController@Setting');

//Articales
Route::get('/newArticale', 'CpanalController@newArticale');
Route::post('/newArticale', 'CpanalController@newArticale');

Route::get('/AllArticales', 'CpanalController@AllArticales');
Route::get('/AllArticales/{id}', function($id){
		$Articales=Articale::find($id);
		$Articales->delete();
		return redirect('AllArticales');
	});

Route::get('/EditArticale/{id}', 'CpanalController@EditArticale');
Route::post('/EditArticale/{id}', 'CpanalController@EditArticale');

//Home
Route::get('/articale/{id}', 'HomeController@articale');
Route::get('/department/{id}', 'HomeController@Department');

//search
Route::get('/searchQuery', 'HomeController@SearchQuery');
Route::get('/search/{word}', 'HomeController@search');


//Comment
Route::post('/CreateComment/{id}', 'HomeController@CreateComment');
Route::get('/deleteComment/{id}', function($id){
		$Comment=Comment::find($id);
		$Comment->delete();
		return redirect()->back();
	});