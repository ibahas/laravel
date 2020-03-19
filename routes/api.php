<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['prefix' => 'user', 'middleware' => 'auth:api', 'namespace' => 'user'], function () {
    Route::get('/show', 'UsersController@show');
});



Route::group(['prefix' => 'auth', 'namespace' => 'Api\Auth'], function () {
    Route::post('register', 'RegisterController@register');
});


Route::group(['prefix' => 'posts', 'middleware' => 'auth:api'], function () {
    Route::resource('/', 'PostController');
    Route::get('/getPostShow/{id?}', 'PostController@getPostShow');
    Route::get('/posts/{user_id}', 'PostController@getPostsforUserId');
    Route::get('/post/{id}', 'PostController@getPostforUserId');
});



Route::group(['prefix' => 'products', 'namespace' => 'products', 'middleware' => 'auth:api'], function () {
    Route::resource('', 'ProductsController');
    Route::get('/all', 'ProductsController@showAllProducts');
    Route::get('/{id}/show', 'ProductsController@showProductById');
    Route::get('/{user_id}/user_id', 'ProductsController@showUserIdProducts');
    Route::post('/products/store', 'ProductsController@storeProduct');
    Route::post('/{id}/destroy', 'ProductsController@destroyProduct');
    Route::get('/{id}/edit', 'ProductsController@editProductWithId');
    Route::any('/{id}/update', 'ProductsController@updateProduct');
});
