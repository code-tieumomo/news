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

Route::get('/', function () {
	$user = User::find(1);

    return view('welcome', [
    	'user' => $user
    ]);
})->name('home');

Route::post('/login', 'AuthController@login')->name('auth.login');
Route::get('/logout', 'AuthController@logout')->name('auth.logout');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin'], function() {
	Route::get('/admin', 'HomeController@home')->name('admin.home');
});
