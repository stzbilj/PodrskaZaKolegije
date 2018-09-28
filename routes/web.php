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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@index');


Route::resource('course', 'CourseController');
Route::group(['prefix' => 'course/{course}'], function() {
    Route::resource('posts', 'PostController')->except('create', 'show', 'edit');
    Route::get('about/{type}', 'OpenTextController@show')->name('opentext.show');
    Route::match(['put', 'patch' ], 'about/{type}', 'OpenTextController@update')->name('opentext.update');    
});