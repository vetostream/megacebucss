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

Route::get('/error404', function () {
    return view('errors/404');
});

Route::get('/posts', 'PostController@index');
Route::get('/myposts', 'PostController@showMyPosts');
Route::get('/insertpost', 'PostController@insertPost');
Route::get('updatepost/{id}', ['uses' => 'PostController@updatePost']);

Route::post('/getpost', 'PostController@getPost');
Route::post('/editpost', 'PostController@editPost');


