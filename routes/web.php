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

Route::prefix('admin')->as('restaurant.')->namespace('Admin')->group(function () {
    Route::get('restaurant', 'restaurantController@index')->name('index');
    Route::get('restaurant/new', 'restaurantController@new')->name('new');
    Route::post('restaurant/store', 'restaurantController@store')->name('store');
    Route::get('restaurant/edit/{restaurant}', 'restaurantController@edit')->name('edit');
    Route::post('restaurant/update/{id}', 'restaurantController@update')->name('update');
    Route::get('restaurant/delete/{id}', 'restaurantController@delete')->name('delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
