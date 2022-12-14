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
    return view('auth.login'); 
});

// StudentController
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('colleges','CollegeController');
Route::resource('depts','DeptController');

Route::resource('students','StudentController'); 
Route::post('/import','StudentController@import')->name('import');
Route::resource('docs','DocController'); 
Route::get('download/{id}', 'DocController@get_file')->name('download'); 

Route::post('search', 'StudentController@search');

Route::get('/GetSearchView','StudentController@GetSearchView')->name('GetSearchView'); 
Route::post('search', 'StudentController@search');
//Route::post('/search','StudentController@search')->name('search'); 
//Route::post('/details','StudentController@details')->name('details'); 
            
 

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});
