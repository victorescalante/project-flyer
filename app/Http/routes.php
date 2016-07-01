<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','PagesController@home');


Route::resource('flyers', 'FlyersController');
Route::get('{zip}/{street}', 'FlyersController@show');
Route::post('{zip}/{street}/photos','PhotosController@store')->name('upload_post_photo');
Route::auth();

Route::get('/home', 'HomeController@index');
