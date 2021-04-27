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

//user
Route::get('/users', 'User\AuthController@showFormLogin')->name('users.showFormLogin');  
Route::post('/users', 'User\AuthController@login')->name('users.login.post');
Route::get('/users/register', 'User\AuthController@showFormRegister')->name('users.showFormRegister');
Route::post('/users/register', 'User\AuthController@register')->name('users.register.post');
Route::group(['namespace' => 'User', 'middleware' => 'user'], function () {
    Route::get('/users/setStatus', 'AuthController@setStatus')->name('users.setStatus');
    Route::get('/blogs/home', 'BlogsController@index')->name('users.blog.index');
});

//admin
Route::get('/admins/login', 'Admin\AuthController@showFormLogin')->name('admins.showFormLogin');
Route::post('/admins/login', 'Admin\AuthController@login')->name('admins.login.post');
Route::group(['namespace' => 'Admin', 'middleware' => 'admin'], function () {
    Route::get('/admins/index', 'AdminsController@index')->name('admins.admin.index');
});
