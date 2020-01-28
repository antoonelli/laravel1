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
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->namespace('Admin')->group(function () {
        Route::prefix('restaurant')->as('restaurant.')->group(function () {
            Route::get('/', 'restaurantController@index')               ->name('index');
            Route::get('new', 'restaurantController@new')               ->name('new');
            Route::post('store', 'restaurantController@store')          ->name('store');
            Route::get('edit/{restaurant}', 'restaurantController@edit')->name('edit');
            Route::post('update/{id}', 'restaurantController@update')   ->name('update');
            Route::get('delete/{id}', 'restaurantController@delete')    ->name('delete');
        });
        Route::prefix('users')->as('user.')->group(function () {
            Route::get('/', 'userController@index')               ->name('index');
            Route::get('new', 'userController@new')               ->name('new');
            Route::post('store', 'userController@store')          ->name('store');
            Route::get('edit/{user}', 'userController@edit')      ->name('edit');
            Route::post('update/{id}', 'userController@update')   ->name('update');
            Route::get('delete/{id}', 'userController@delete')    ->name('delete');
        });
        Route::prefix('menus')->as('menu.')->group(function () {
            Route::get('/', 'userController@index')               ->name('index');
            Route::get('new', 'userController@new')               ->name('new');
            Route::post('store', 'userController@store')          ->name('store');
            Route::get('edit/{menu}', 'userController@edit')      ->name('edit');
            Route::post('update/{id}', 'userController@update')   ->name('update');
            Route::get('delete/{id}', 'userController@delete')    ->name('delete');
        });
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
