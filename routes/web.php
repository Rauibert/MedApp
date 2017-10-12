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
});

Route::get('/create', 'MedsController@create');
Route::post('/create', 'MedsController@store');
Route::get('/meds', 'MedsController@index');
Route::get('/meds/{slug?}', 'MedsController@show');
Route::get('/meds/{slug?}/edit', 'MedsController@edit');
Route::post('/meds/{slug?}/edit', 'MedsController@update');
Route::post('/meds/{slug?}/delete', 'MedsController@destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
