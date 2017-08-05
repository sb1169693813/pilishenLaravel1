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
Route::get('/', 'HomeController@welcome')->name('/');
//projects
Route::resource('projects', 'ProjectsController');
//tasks
Route::get('tasks/charts', 'TaskController@chart')->name('tasks.charts');

Route::resource('tasks', 'TaskController');
Route::post('tasks/{task}/check', 'TaskController@check')->name('tasks.check');

Route::get('/home', 'HomeController@index');
Route::get('/send', 'SendController@index');
Route::get('/active', 'SendController@send')->name('active');
Route::auth();
