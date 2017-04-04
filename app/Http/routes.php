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

Route::auth();

Route::get('/', 'WelcomeController@index')->name('home');
Route::get('/logout', 'SessionsController@destroy');

Route::group(['middleware' => ['auth', 'admin']], function ()
{
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin/{user}', 'AdminController@edit');
    Route::put('/admin', 'AdminController@update')->name('update');
    Route::delete('/admin/{user}/delete', 'AdminController@delete');
});

Route::group(['middleware' => 'auth'], function ()
{
    Route::get('/home', 'HomeController@index')->name('front');

    Route::get('/edit', 'EditController@edit');
    Route::put('/edit', 'EditController@update');
    Route::delete('/edit/{user}', 'EditController@delete');

    Route::get('/all-courses', 'CourseController@index')->name('all-courses');
    Route::post('/all-courses', 'CourseController@store');
    Route::get('/all-courses/create', 'CourseController@create');
    Route::get('/all-courses/{course}', 'CourseController@show');
    Route::delete('/all-courses/delete/{course}', 'CourseController@delete');

    Route::get('/my-courses', 'MyCourseController@index')->name('my-courses');
    Route::post('/my-courses', 'MyCourseController@store');
    Route::get('/my-courses/{course}', 'MyCourseController@show');
    Route::get('/my-courses/{course}/edit', 'MyCourseController@edit');
    Route::put('/my-courses/update/{course}', 'MyCourseController@update');

    Route::post('/my-courses/lecture/store', 'LectureController@store');

    Route::get('/comments/{id}', 'CommentController@index');
    Route::delete('/comments/{id}', 'CommentController@delete');
    Route::post('/all-courses/{id}/comments', 'CommentController@save');
});