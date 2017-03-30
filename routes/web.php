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

Route::get('/', function () {
    return redirect('/blog');
});

Route::get('blog', 'BlogController@index');
Route::get('blog/tag/{tag}', 'BlogController@indexByTag');
Route::get('blog/{slug}', 'BlogController@showPost');

// Admin area
Route::get('admin', function () {
    return redirect('/admin/post');
});
Route::group(['namespace' => 'Admin', 'middleware' => 'can:admin-action'], function () {
    Route::post('admin/post/store', 'PostController@store');
    Route::resource('admin/post', 'PostController', ['except' => 'show']);
    Route::resource('admin/tag', 'TagController');
    Route::get('admin/upload', 'UploadController@index');
    Route::post('admin/upload/file', 'UploadController@uploadFile');
    Route::delete('admin/upload/file', 'UploadController@deleteFile');
    Route::post('admin/upload/folder', 'UploadController@createFolder');
    Route::delete('admin/upload/folder', 'UploadController@deleteFolder');
});

 //Logging in and out
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');
Route::get('auth\login', 'Auth\AuthController@getLogin');
Route::post('auth\login', 'Auth\AuthController@postLogin');
Route::get('auth\logout', 'Auth\AuthController@getLogout');


Auth::routes();
Route::get('home', 'BlogController@index');
Route::resource('/blog/{post_slug}/comment', 'CommentController', ['except' => 'show']);
Route::resource('comment', 'CommentController', ['except' => 'show']);
//Route::post('comment','CommentController@store');
Route::get('lang/{locale}',function ($locale){
    Cookie::queue('lang', $locale, 4320);
   return redirect()->back();
});