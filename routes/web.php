<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Authentication Routes
Auth::routes();


Route::get('/home', 'HomeController@index');


//Research routes
Route::get('/research','ResearchController@index'); //show list of exhibited researches
Route::get('research/detail/{id}','ResearchController@show'); //show details of the chosen research by id
Route::get('/research/create','ResearchController@create'); //show form for creating Research
Route::post('/research/store','ResearchController@store'); //store newly created resource
Route::get('/research/edit/{id}','ResearchController@edit'); //show form to edit exhibited research
Route::post('/research/update/{id}','ResearchController@update'); //update edited researches
Route::get('/research/exterminate/{id}','ResearchController@destroy'); //destroy the resource of the id indicated.

Route::get('/error404', function () {
    return view('errors/404');
});

Route::get('/posts', 'PostController@index');
Route::get('/posts/self', 'PostController@showMyPosts');
Route::get('/posts/insert', 'PostController@insertPost');
Route::get('/posts/update/{id}', ['uses' => 'PostController@updatePost']);
Route::get('/posts/delete/{id}', ['uses' => 'PostController@deletePost']);
Route::post('/posts/get', 'PostController@getPost');
Route::post('/posts/edit', 'PostController@editPost');

