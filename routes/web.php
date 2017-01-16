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

// Lists all posts
Route::get('/posts', 'PostController@index');
// Lists one post via id
Route::get('/posts/postid/{postid}', 'PostController@showPost');
// Lists all user's posts
Route::get('/posts/self', 'PostController@showMyPosts');
// Add post to table
Route::get('/posts/insert', 'PostController@insertPost');
// Display edit post of id
Route::get('/posts/update/{postid}/{userid}', 'PostController@updatePost');
// Display delete post of id
Route::get('/posts/delete/{postid}/{userid}', 'PostController@deletePost');
// Gets add post form
Route::post('/posts/get', 'PostController@getPost');
// Validate edit post form of id
Route::post('/posts/edit/{postid}/{userid}', 'PostController@editPost');


// Display profile
Route::get('/profile', 'ProfileController@index');
// Display edit profile of id
Route::get('/profile/edit', 'ProfileController@edit');
// Validate edit post form
Route::post('/profile/editCheck', 'ProfileController@editCheck');
// Delete profile of id
Route::get('/profile/delete', 'ProfileController@deleteUser');
// Destroy the account or account and posts of the id 
Route::post('/profile/deleteOption','ProfileController@deleteOption');
