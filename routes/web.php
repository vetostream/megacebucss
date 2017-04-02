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
Route::get('user/activation/{token}','Auth\AuthController@activateUser')->name('user.activate');


Route::get('/home', 'PostController@index');
Route::get('/about', function() { return view ('about'); });

Route::get('/tagsdb', function () {	return view('welcome');	});
Route::post('/tagsdb', 'HomeController@tagsdb');
Route::get('/tagsdbResearch', function () { return view('welcome'); });
Route::post('/tagsdbResearch', 'HomeController@tagsdbResearch');

//Research routes
Route::get('/research','ResearchController@index'); //show list of exhibited researches, view = research.index
Route::get('/research/detail/{id}','ResearchController@show'); //show details of the chosen research by id, view = research.detail
Route::get('/research/create','ResearchController@create'); //show form for creating Research, view = research.create
Route::post('/research/store','ResearchController@store'); //store newly created resource
Route::get('/research/edit/{id}','ResearchController@edit'); //show form to edit exhibited research
Route::post('/research/update/{id}','ResearchController@update'); //update edited researches
Route::get('/research/exterminate/{id}','ResearchController@destroy'); //destroy the resource of the id indicated.
Route::get('/research/download','ResearchController@showManus'); //destroy the resource of the id indicated.
Route::post('/research/postcomment','ResearchController@storeComments'); //Allow user to post a comment.

// Fund research
Route::post('/research/fund/{research_id}/{funder_id}', 'ResearchController@fund');
// View fund history
Route::get('/research/fund/history/{id}', 'ResearchController@fundHistory');

Route::get('/error404', function () {
    return view('errors/404');
});

// Lists all posts, view = posts.showposts
Route::get('/posts', 'PostController@index');
// Lists one post via id, view = posts.showpost
Route::get('/posts/postid/{postid}', 'PostController@showPost');
// Lists all user's posts, view = posts.showmyposts
Route::get('/posts/self', 'PostController@showMyPosts');
// Add post to table, view = posts.createpost
Route::get('/posts/insert', 'PostController@insertPost');
// Display edit post of id, view = posts.editpost
Route::get('/posts/update/{postid}/{userid}', 'PostController@updatePost');
// Display delete post of id
Route::get('/posts/delete/{postid}/{userid}', 'PostController@deletePost');
// Gets add post form
Route::post('/posts/get', 'PostController@getPost');
// Validate edit post form of id
Route::post('/posts/edit/{postid}/{userid}', 'PostController@editPost');
Route::post('/posts/postcomment', 'PostController@insertPostComment');
//zafra added report posts
Route::get('/posts/reportPostdb/{postid}/{userid}', 'PostController@reportPostdb');
Route::get('/posts/unreport/{postid}/{userid}', 'PostController@unreport');

// Display profile, view = profiles.profile
Route::get('/profile', 'ProfileController@index');
// Display profile via id, view = profiles.viewprofile
Route::get('/profile/profileid/{userid}', 'ProfileController@visit');
// Display edit profile of id, view = profiles.editprofile
Route::get('/profile/edit', 'ProfileController@edit');
// Validate edit post form
Route::post('/profile/editCheck', 'ProfileController@editCheck');
// Delete profile of id, view = profiles.delete
Route::get('/profile/delete', 'ProfileController@deleteUser');
// Destroy the account or account and posts of the id 
Route::post('/profile/deleteOption','ProfileController@deleteOption');

// Admin routes
Route::get('/admin', 'AdminController@index');

// SuperAdmin routes
Route::get('/superadmin', 'SuperadminController@index' );
Route::get('/superadmin/viewAllUsers', 'SuperadminController@viewAllUsers');
Route::get('/superadmin/deleteUser/{id}', 'SuperadminController@deleteUser');
Route::post('/superadmin/changeRole', 'SuperadminController@changeRole');