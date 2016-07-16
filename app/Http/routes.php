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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'isroleadmin'], function () {
    Route::group(['prefix' => 'admin','namespace' => 'Admin'],function () {
        Route::get('index',[
            'as' => 'index',
            'uses' => 'AdminController@index',
        ]);
        Route::resource('course', 'CourseController');
        Route::resource('subject', 'SubjectController');
        Route::get('course/{id}/subjects', [
            'as' => 'course.subject',
            'uses' => 'CourseController@viewSubject',
            ]);
        /**
         * Trainee
         */
        Route::resource('trainee','TraineeController');
        Route::resource('subject/{id}/tasks', 'TaskController');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User'], function () {
        Route::resource('user', 'UserController');
        Route::get('user/{id}/report', [
            'as' => 'report',
            'uses' => 'UserController@report',
        ]);
        Route::post('user/{id}/storeReport', [
            'as' => 'storeReport',
            'uses' => 'UserController@storeReport',
        ]);
        Route::get('user/{id}/historyCourse', [
            'as' => 'historyCourse',
            'uses' => 'UserController@historyCourse',
        ]);
    });

});

