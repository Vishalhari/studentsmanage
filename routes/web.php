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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\StudentsController@index');
Route::get('addstudent', 'App\Http\Controllers\StudentsController@create');
Route::post('createstudent', 'App\Http\Controllers\StudentsController@store');
Route::get('editstudent/{id}', 'App\Http\Controllers\StudentsController@edit');
Route::post('updatestudent/{id}', 'App\Http\Controllers\StudentsController@UpdateStudent');
Route::get('delstudent/{id}', 'App\Http\Controllers\StudentsController@DeleteStudent');


Route::get('markslist', 'App\Http\Controllers\MarksController@index');
Route::get('addmarks', 'App\Http\Controllers\MarksController@addmarks');
Route::post('storemarks', 'App\Http\Controllers\MarksController@storemarks');
Route::get('editmarks/{id}', 'App\Http\Controllers\MarksController@editmarks');
Route::post('updatemarks/{id}', 'App\Http\Controllers\MarksController@updatemarks');
Route::get('delmarks/{id}', 'App\Http\Controllers\MarksController@deletemarks');
