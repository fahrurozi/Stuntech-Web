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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/post_login', 'Auth\LoginController@post_login')->name('post_login');

Route::get('/dashboard', 'Main\HomeController@index')->name('home');

//Article
Route::get('/article', 'Main\Admin\ArticleController@index')->name('article');

// User
Route::get('/user', 'Main\Admin\UserController@index')->name('user');
