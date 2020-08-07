<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/categories/','categoriesController@index');

Route::post('store-categories','categoriesController@store');

Route::get('/categories/index','categoriesController@show');

Route::get('categories/{category}/delete','categoriesController@destroy');

Route::get('categories/{category}/edit','categoriesController@edit');

Route::post('categories/{category}/update-categories','categoriesController@update');

