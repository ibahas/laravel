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



Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::group(['prefix' => 'posts', 'middleware' => 'auth'], function () {
    Route::resource('/', 'PostController');
    Route::get('/getPostShow/{id?}', 'PostController@getPostShow');
});

Route::group(['prefix' => 'products', 'middleware' => 'auth', 'namespace' => 'products'], function () {
    Route::resource('', 'ProductsController');
    Route::get('/all', 'ProductsController@index');
    Route::get('/{id}/show', 'ProductsController@show');
    Route::get('/{user_id}/user_id', 'ProductsController@showByUserId');
    Route::get('/product/create', 'ProductsController@create');
    Route::post('/products/store', 'ProductsController@store');
    Route::post('/products/{id}/destroy', 'ProductsController@destroy');
    Route::get('/{id}/edit', 'ProductsController@edit');
    Route::any('/{id}/update', 'ProductsController@update');
});
