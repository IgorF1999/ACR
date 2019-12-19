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

Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::resource('projects','ProjectsController');


/* resource equivale a (uso de conventions/standards)
Route::get('/projects', 'ProjectsController@index');
Route::get('/projects/create', 'ProjectsController@create');
Route::post('/projects', 'ProjectsController@store');
Route::get('/projects/{project}', 'ProjectsController@show');
Route::get('/projects/{project}/edit', 'ProjectsController@edit');
Route::patch('/projects/{project}', 'ProjectsController@update');
Route::delete('/projects/{project}', 'ProjectsController@destroy');
*/


Route::resource('posts','PostsController');


// AVAL
Route::get('/articles/sort/{order}', 'ArticlesController@sort');
Route::get('/articles/featured', 'ArticlesController@featured');
Route::resource('articles', 'ArticlesController');

//tasks
Route::patch('/tasks/{task}', 'ProjectTasksController@update')->middleware('auth'); ;
Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
Route::resource('projects', 'ProjectsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');