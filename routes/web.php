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

Route::prefix('admin')->group(function () {
    Route::get('restaurant', 'Admin\restaurantController@index')->name('restaurant.index');
    Route::get('restaurant/new', 'Admin\restaurantController@new')->name('restaurant.new');
    Route::post('restaurant/store', 'Admin\restaurantController@store')->name('restaurant.store');
    Route::get('restaurant/edit/{restaurant}', 'Admin\restaurantController@edit')->name('restaurant.edit');
    Route::post('restaurant/update/{id}', 'Admin\restaurantController@update')->name('restaurant.update');
    Route::get('restaurant/delete/{id}', 'Admin\restaurantController@delete')->name('restaurant.delete');
});
