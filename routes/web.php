<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('posts/{slug}', 'PostController@show')->name('posts.show');
Route::get('categories/{slug}', 'CategoryController@show')->name('categories.show');
Route::get('categories/{slug}/{subSlug}', 'CategoryController@show')->name('subCategories.show');
Route::get('lastest-posts', 'PostController@lastest')->name('posts.lastest');
Route::get('search', 'PostController@search')->name('posts.search');
Route::post('comments', 'CommentController@comment')->name('comments.post');
Route::delete('comments/{id}', 'CommentController@destroy')->name('comments.destroy');
Route::put('comments', 'CommentController@update')->name('comments.update');
Route::get('test', 'HomeController@test');
Route::get('logs', 'LogController@index');

Route::get('auth', 'AuthController@show')->name('auth.show');
Route::post('auth/login', 'AuthController@login')->name('auth.login');
Route::post('auth/register', 'AuthController@register')->name('auth.register');
Route::get('auth/facebook', 'AuthController@facebookRedirect')->name('auth.login.facebook');
Route::get('auth/facebook/callback', 'AuthController@loginWithFacebook')->name('auth.login.facebook.callback');
Route::get('logout', 'AuthController@logout')->name('auth.logout');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('dashboard', 'HomeController@home')->name('admin.home');

    Route::resource('users', 'UserController');
    Route::resource('writers', 'WriterController');
    Route::delete('writers/remove-write-permission/{writer}', 'WriterController@removeWritePermission')->name('writers.removeWritePermission');
    Route::resource('manage-posts', 'PostController');
    Route::put('manage-comments/update', 'CommentController@update')->name('manage-comments.update');
    Route::put('manage-comments/destroy', 'CommentController@destroy')->name('manage-comments.destroy');

    //Debug
    Route::get('change-most-recent-user', 'UserController@changeMostRecentUser');
});

Route::group(['middleware' => 'auth', 'namespace' => 'UserFeatures', 'prefix' => 'user-features'], function() {
    Route::get('dashboard', 'UserFeaturesController@index')->name('user-features.index');
    Route::put('infomations', 'UserFeaturesController@putInfomations')->name('infomations.update');
    Route::put('password', 'UserFeaturesController@putPassword')->name('password.update');
    Route::put('comments', 'UserFeaturesController@putComments')->name('comments.update');
    Route::delete('comments/{id}', 'UserFeaturesController@deleteComment')->name('comments.destroy');

    Route::get('become-writer', 'UserFeaturesController@showBecomeWriter')->name('request.show-become-writer');
    Route::post('become-writer', 'UserFeaturesController@postBecomeWriter')->name('request.post-become-writer');

    Route::get('posts', 'UserFeaturesController@showPosts')->name('writer.posts');
    Route::delete('posts/{id}', 'UserFeaturesController@destroyPost')->name('writer.destroyPosts');
    Route::get('manage-post/{id}', 'UserFeaturesController@managePost')->name('writer.managePost');
    Route::get('create-post', 'UserFeaturesController@createPost')->name('writer.create');
});
