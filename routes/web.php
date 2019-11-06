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
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/patients', 'PatientsController@index')->name('patients')->middleware('auth');

Route::resource('patients', 'PatientsController')->middleware('auth');

