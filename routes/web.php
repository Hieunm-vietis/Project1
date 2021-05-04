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
Route::get('/users', 'User\AuthController@showFormLogin')->name('user.showFormLogin');  
Route::post('/users', 'User\AuthController@login')->name('user.login.post');
Route::get('/users/register', 'User\AuthController@showFormRegister')->name('user.showFormRegister');
Route::post('/users/register', 'User\AuthController@register')->name('user.register.post');

// Route::get('/auth/redirect/{provider}', 'User\AuthController@redirect');
// Route::get('/callback/{provider}', 'User\AuthController@callback');
// Route::get('/users/setStatus/{user}', 'User\AuthController@setStatus')->name('users.setStatus');

Route::group(['namespace' => 'User', 'middleware' => ['user', 'status']], function () {
    //user
    Route::get('/blogs/home', 'BlogsController@index')->name('user.blogs.index');
    Route::get('/users/{user}/show', 'UsersController@show')->name('user.users.show');

    //Blogs
    Route::get('/blogs/{blog}/show', 'BlogsController@show')->name('user.blogs.show');
    Route::get('/blogs/{blog}/edit', 'BlogsController@edit')->name('user.blogs.edit');
});

//admin
Route::get('/admin/login', 'Admin\AuthController@showFormLogin')->name('admins.showFormLogin');
Route::post('/admin/login', 'Admin\AuthController@login')->name('admins.login.post');
Route::group(['namespace' => 'Admin', 'middleware' => 'admin'], function () {
    Route::get('/admin/index', 'AdminsController@index')->name('admins.admin.index');
    Route::get('/admin/admins/create', 'AdminsController@create')->name('admins.admin.create');
    Route::post('/admin/admins/store', 'AdminsController@store')->name('admins.admin.store');
});
