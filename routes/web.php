<?php

/*
|--------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@index');
Route::get('results/all', 'HomeController@results')->name('results.all');

Route::resource('course', 'CourseController');

Route::group(['prefix' => 'course/{course}'], function() {
    Route::resource('posts', 'PostController')->except('create', 'show', 'edit');
    
    Route::get('about/{type}', 'CourseViewController@show')->name('courseview.show');
    Route::match(['put', 'patch' ], 'about/{type}', 'CourseViewController@update')->name('courseview.update');

    Route::resource('exams', 'ExamController')->only('index', 'store', 'destroy');
    Route::resource('assignments', 'AssignmentController')->only('store', 'destroy');

    Route::resource('results', 'ResultsController')->except('create', 'edit');
});