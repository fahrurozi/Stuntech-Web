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

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});


Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/post_login', 'Auth\LoginController@post_login')->name('post_login');

Route::get('/dashboard', 'Main\HomeController@index')->name('home');

//Article
Route::get('/article', 'Main\Admin\ArticleController@index')->name('article');

Route::get('/article/index', function () {
    return view('/article/index_article');
});

Route::get('/article/create', function () {
    return view('/article/create_article');
});

Route::get('/article/details', function () {
    return view('/article/details_article');
});

Route::get('/article/edit', function () {
    return view('/article/edit_article');
});

//Maps Admin
Route::get('/mapsadmin/index', function () {
    return view('/mapsadmin/index_mapsadmin');
});

Route::get('/mapsadmin/create', function () {
    return view('/mapsadmin/create_mapsadmin');
});

Route::get('/mapsadmin/details', function () {
    return view('/mapsadmin/details_mapsadmin');
});

Route::get('/mapsadmin/edit', function () {
    return view('/mapsadmin/edit_mapsadmin');
});

//Trace
Route::get('/trace/index', function () {
    return view('/trace/index_trace');
});

Route::get('/trace/create', function () {
    return view('/trace/create_trace');
});

Route::get('/trace/details', function () {
    return view('/trace/details_trace');
});

Route::get('/trace/edit', function () {
    return view('/trace/edit_trace');
});


// User
Route::get('/user', 'Main\Admin\UserController@index')->name('user');
