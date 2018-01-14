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

Route::get('/enterprise','DisplayController@enterprise');

Route::post('/enterprise','DisplayController@enterprise');

Route::get('/jobDetail','DisplayController@jobDetail');

Route::get('/businessDetail','DisplayController@businessDetail');

Route::get('/enterpriseDetail','DisplayController@enterpriseDetail');

Route::get('/profile','DisplayController@profile');

Route::post('/login_submit','FormController@login');

Route::post('/register_submit','FormController@register');

Route::get('/about','DisplayController@about');

Route::get('/completeSearch','DisplayController@search');

Route::get('/message','DisplayController@message');

Route::get('/history','DisplayController@history');

Route::get('/logout','DisplayController@logout');

Route::post('/changeInfor','FormController@changeInfor');
	
Route::post('/changePass','FormController@changePass');

Route::post('/post1','DisplayController@post1');

Route::get('/post1','DisplayController@post1');

Route::post('/post2','DisplayController@post2');

Route::get('/post2','DisplayController@post2');

Route::post('/post3','DisplayController@post3');

Route::get('/post3','DisplayController@post3');

Route::post('/post4','DisplayController@post4');

Route::get('/post4','DisplayController@post4');

Route::post('/send_submit','FormController@send');