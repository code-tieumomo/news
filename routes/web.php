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
Route::get('categories', 'CategoryController@index')->name('categories.index');
Route::get('categories/{slug}', 'CategoryController@show')->name('categories.show');
Route::get('categories/{slug}/{subSlug}', 'CategoryController@show')->name('subCategories.show');
Route::get('test', 'HomeController@test');

Route::post('/login', 'AuthController@login')->name('auth.login');
Route::get('/logout', 'AuthController@logout')->name('auth.logout');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
	Route::get('/dashboard', 'HomeController@home')->name('admin.home');

	Route::resource('users', 'UserController');
	Route::resource('writers', 'WriterController');
	Route::delete('writers/remove-write-permission/{writer}', 'WriterController@removeWritePermission')->name('writers.removeWritePermission');
	Route::resource('manage-posts', 'PostController');
	Route::put('comments/update', 'CommentController@update')->name('comments.update');
	Route::put('comments/destroy', 'CommentController@destroy')->name('comments.destroy');

	//Debug
	Route::get('/change-most-recent-user', 'UserController@changeMostRecentUser');
});
