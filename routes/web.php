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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index');

Route::get('/social/auth/{provider}', 'Auth\SocialAuthController@redirectToProvider');

Route::get('/social/auth/callback/{provider}', 'Auth\SocialAuthController@handleProviderCallback');

Route::get('/post/create', 'PostController@getCreatePost');
