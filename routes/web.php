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

Route::get('/auth/redirect/{provider}', 'User\AuthController@redirect');
Route::get('/callback/{provider}', 'User\AuthController@callback');
Route::get('/users/setStatus/{user}', 'User\AuthController@setStatus')->name('users.setStatus');

Route::group(['namespace' => 'User', 'middleware' => 'user'], function () {
    Route::get('/blogs/home', 'BlogsController@index')->name('users.blog.index');
});

//admin
Route::get('/admin/login', 'Admin\AuthController@showFormLogin')->name('admins.showFormLogin');
Route::post('/admin/login', 'Admin\AuthController@login')->name('admins.login.post');
Route::group(['namespace' => 'Admin', 'middleware' => 'admin'], function () {
    Route::get('/admin/index', 'AdminsController@index')->name('admins.admin.index');
    Route::get('/admin/admins/create', 'AdminsController@create')->name('admins.admin.create');
    Route::post('/admin/admins/store', 'AdminsController@store')->name('admins.admin.store');
});
