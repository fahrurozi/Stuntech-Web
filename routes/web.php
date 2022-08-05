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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/home', function () {
    return view('home');
});


Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/post_login', 'Auth\LoginController@post_login')->name('post_login');

Route::get('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/post_register', 'Auth\RegisterController@post_register')->name('post_register');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/dashboard', 'Main\HomeController@index')->name('home');
Route::get('/profile', 'Main\ProfilController@index')->name('profile');

//Article
Route::get('/dashboard/article', 'Main\Admin\ArticleController@index')->name('article');
Route::get('/dashboard/article/create', 'Main\Admin\ArticleController@create')->name('article.create');
Route::post('/dashboard/article/store', 'Main\Admin\ArticleController@store')->name('article.store');

// Stunting Info
Route::get('/dashboard/stunting_info', 'Main\Admin\StuntingInfoController@index')->name('stunting_info');
Route::get('/dashboard/stunting_info/create', 'Main\Admin\StuntingInfoController@create')->name('stunting_info.create');
Route::post('/dashboard/stunting_info/store', 'Main\Admin\StuntingInfoController@store')->name('stunting_info.store');
Route::get('/dashboard/stunting_info/show/{id}', 'Main\Admin\StuntingInfoController@show')->name('stunting_info.show');
Route::get('/dashboard/stunting_info/edit/{id}', 'Main\Admin\StuntingInfoController@edit')->name('stunting_info.edit');
Route::post('/dashboard/stunting_info/update/{id}', 'Main\Admin\StuntingInfoController@update')->name('stunting_info.update');
Route::get('/dashboard/stunting_info/destroy/{id}', 'Main\Admin\StuntingInfoController@destroy')->name('stunting_info.destroy');

// Nutrition Info
Route::get('/dashboard/nutrition_info', 'Main\Admin\NutritionInfoController@index')->name('nutrition_info');
Route::get('/dashboard/nutrition_info/create', 'Main\Admin\NutritionInfoController@create')->name('nutrition_info.create');
Route::post('/dashboard/nutrition_info/store', 'Main\Admin\NutritionInfoController@store')->name('nutrition_info.store');
Route::get('/dashboard/nutrition_info/show/{id}', 'Main\Admin\NutritionInfoController@show')->name('nutrition_info.show');
Route::get('/dashboard/nutrition_info/edit/{id}', 'Main\Admin\NutritionInfoController@edit')->name('nutrition_info.edit');
Route::post('/dashboard/nutrition_info/update/{id}', 'Main\Admin\NutritionInfoController@update')->name('nutrition_info.update');
Route::get('/dashboard/nutrition_info/destroy/{id}', 'Main\Admin\NutritionInfoController@destroy')->name('nutrition_info.destroy');

// Care Nutrition
Route::get('/dashboard/care_nutrition', 'Main\Admin\CareNutritionController@index')->name('care_nutrition');
Route::get('/dashboard/care_nutrition/create', 'Main\Admin\CareNutritionController@create')->name('care_nutrition.create');
Route::post('/dashboard/care_nutrition/store', 'Main\Admin\CareNutritionController@store')->name('care_nutrition.store');
Route::get('/dashboard/care_nutrition/show/{id}', 'Main\Admin\CareNutritionController@show')->name('care_nutrition.show');
Route::get('/dashboard/care_nutrition/edit/{id}', 'Main\Admin\CareNutritionController@edit')->name('care_nutrition.edit');
Route::post('/dashboard/care_nutrition/update/{id}', 'Main\Admin\CareNutritionController@update')->name('care_nutrition.update');
Route::get('/dashboard/care_nutrition/destroy/{id}', 'Main\Admin\CareNutritionController@destroy')->name('care_nutrition.destroy');

// Food Help
Route::get('/dashboard/food_help', 'Main\Admin\FoodHelpController@index')->name('food_help');
Route::get('/dashboard/food_help/create', 'Main\Admin\FoodHelpController@create')->name('food_help.create');
Route::post('/dashboard/food_help/store', 'Main\Admin\FoodHelpController@store')->name('food_help.store');
Route::get('/dashboard/food_help/show/{id}', 'Main\Admin\FoodHelpController@show')->name('food_help.show');
Route::get('/dashboard/food_help/edit/{id}', 'Main\Admin\FoodHelpController@edit')->name('food_help.edit');
Route::post('/dashboard/food_help/update/{id}', 'Main\Admin\FoodHelpController@update')->name('food_help.update');
Route::get('/dashboard/food_help/destroy/{id}', 'Main\Admin\FoodHelpController@destroy')->name('food_help.destroy');

// Hello Stunting
Route::get('/dashboard/hello_stunting', 'Main\Admin\HelloStuntingController@index')->name('hello_stunting');
Route::get('/dashboard/hello_stunting/create', 'Main\Admin\HelloStuntingController@create')->name('hello_stunting.create');
Route::post('/dashboard/hello_stunting/store', 'Main\Admin\HelloStuntingController@store')->name('hello_stunting.store');
Route::get('/dashboard/hello_stunting/show/{id}', 'Main\Admin\HelloStuntingController@show')->name('hello_stunting.show');
Route::get('/dashboard/hello_stunting/edit/{id}', 'Main\Admin\HelloStuntingController@edit')->name('hello_stunting.edit');
Route::post('/dashboard/hello_stunting/update/{id}', 'Main\Admin\HelloStuntingController@update')->name('hello_stunting.update');
Route::get('/dashboard/hello_stunting/destroy/{id}', 'Main\Admin\HelloStuntingController@destroy')->name('hello_stunting.destroy');

// Maps
Route::get('/dashboard/maps', 'Main\Admin\MapsController@index')->name('maps');
Route::get('/dashboard/maps/add', 'Main\Admin\MapsController@create')->name('maps.create');
Route::get('/dashboard/maps/store/{place_id}', 'Main\Admin\MapsController@store')->name('maps.store');
Route::get('/dashboard/maps/destroy/{place_id}', 'Main\Admin\MapsController@destroy')->name('maps.destroy');

// Review
Route::get('/dashboard/review', 'Main\Admin\ReviewController@index')->name('review');
Route::get('/dashboard/review/show/{id}', 'Main\Admin\ReviewController@show')->name('review.show');
Route::get('/dashboard/review/destroy/{id}', 'Main\Admin\ReviewController@destroy')->name('review.destroy');

// Fun Stunting
Route::get('/dashboard/fun_stunting', 'Main\Admin\FunController@index')->name('fun_stunting');
Route::get('/dashboard/fun_stunting/level/{id}', 'Main\Admin\FunController@list')->name('fun_stunting.list');
Route::get('/dashboard/fun_stunting/level/{id}/create', 'Main\Admin\FunController@create')->name('fun_stunting.create');
Route::post('/dashboard/fun_stunting/level/{id}/store', 'Main\Admin\FunController@store')->name('fun_stunting.store');
Route::get('/dashboard/fun_stunting/destroy/{id}', 'Main\Admin\FunController@destroy')->name('fun_stunting.destroy');


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
