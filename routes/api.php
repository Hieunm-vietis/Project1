<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::get('/forget_password', 'AuthController@forgetPassword');
Route::post('/reset_password', 'AuthController@reset_password');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['jwt']], function () {
    Route::get('/users', 'API\User\UsersController@index');
    Route::get('/blogs', 'API\User\BlogsController@index');
    Route::get('/blogs/search', 'API\User\BlogsController@search');
    Route::post('/blogs/create', 'API\User\BlogsController@store');
});

