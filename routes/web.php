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

<<<<<<< HEAD
Route::post('contact', 'ContactController@sendContactInfo');

Route::get('/post2business', 'JobController@post2business');

Route::post('/post2business', 'JobController@post2business');

Route::post('/post3', 'JobController@add');

Route::get('/post3', 'JobController@add');

Route::get('/publish/destroy/{id}', 'JobController@destroy');

Route::get('/publish', 'JobController@index');

Route::post('/publish', 'JobController@index');

Route::post('/post2','JobController@post2');

Route::get('/post2','JobController@post2');



=======
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
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

<<<<<<< HEAD
Route::get('/profile_user','DisplayController@profile_user');

Route::get('/profile_enterprise','DisplayController@profile_enterprise');

Route::post('/login_submit','FormController@login');

Route::post('/enterprise_register_submit','FormController@enterprise_register');

Route::post('/user_register_submit','FormController@user_register');
=======
Route::get('/profile','DisplayController@profile');

Route::post('/login_submit','FormController@login');

Route::post('/register_submit','FormController@register');
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f

Route::get('/about','DisplayController@about');

Route::get('/completeSearch','DisplayController@search');

Route::get('/message','DisplayController@message');

Route::get('/history','DisplayController@history');

<<<<<<< HEAD
Route::get('/member','DisplayController@member');

Route::get('/logout','DisplayController@logout');

Route::post('/changeInfor_user','FormController@changeInfor_user');

Route::post('/changeInfor_enterprise','FormController@changeInfor_enterprise');
	
Route::post('/changePass_user','FormController@changePass_user');

Route::post('/changePass_enterprise','FormController@changePass_enterprise');
=======
Route::get('/logout','DisplayController@logout');

Route::post('/changeInfor','FormController@changeInfor');
	
Route::post('/changePass','FormController@changePass');
>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f

Route::post('/post1','DisplayController@post1');

Route::get('/post1','DisplayController@post1');

<<<<<<< HEAD
=======
Route::post('/post2','DisplayController@post2');

Route::get('/post2','DisplayController@post2');

Route::post('/post3','DisplayController@post3');

Route::get('/post3','DisplayController@post3');

>>>>>>> e8f47ce5b5d204bb89afdf96a6f4b6274c55e34f
Route::post('/post4','DisplayController@post4');

Route::get('/post4','DisplayController@post4');

Route::post('/send_submit','FormController@send');