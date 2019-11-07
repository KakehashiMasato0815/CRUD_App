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

Route::get('/', function() {
    return view('welcome');
});

Route::group(['prefix' => 'student'], function () {
    Route::get('list', 'StudentController@get_index');
    Route::get('new', 'StudentController@new_index');
    Route::patch('new', 'StudentController@new_confirm');
    Route::post('new', 'StudentController@new_finish');
});