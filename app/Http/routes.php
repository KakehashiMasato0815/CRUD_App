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
    /* index */
    Route::get('list', 'StudentController@get_index');
    /* 新規登録 */
    Route::get('new', 'StudentController@new_index');
    Route::patch('new', 'StudentController@new_confirm');
    Route::post('new', 'StudentController@new_finish');
    /* 編集 */
    Route::get('edit/{id}', 'StudentController@edit_index');
    Route::patch('edit/{id}', 'StudentController@edit_confirm');
    Route::post('edit/{id}', 'StudentController@edit_finish');
});