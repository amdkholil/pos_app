<?php

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

Route::get('/', 'Front\HomeController@index');

Route::get('login','Admin\AuthController@login')->name('login');
Route::get('logout','Admin\AuthController@logout')->name('logout');
Route::post('logingIn','Admin\AuthController@logingIn');

Route::group(['middleware'=>'auth', 'prefix'=>'admin'],function(){
    Route::get('/', 'Admin\DashboardController@index');
    Route::resource('category','Admin\CategoryController');
    Route::resource('product','Admin\ProductController');
});
