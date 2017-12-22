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

Route::get('/homepage','DisplayController@homepage');

Route::get('/login','DisplayController@login');

Route::get('/job','DisplayController@job');

Route::post('/job','DisplayController@job');

Route::get('/business','DisplayController@business');

Route::post('/business','DisplayController@business');

Route::get('/jobDetail','DisplayController@jobDetail');

Route::get('/businessDetail','DisplayController@businessDetail');

Route::get('/profile','DisplayController@profile');

Route::post('/login_submit','FormController@login');

Route::post('/register_submit','FormController@register');

Route::get('/about','DisplayController@about');

Route::get('/completeSearch','DisplayController@search');