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

Route::group(['middleware' => ['order']], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/products/{productCategory}', 'ProductController@index')->name('product');

    Route::get('/product/{product}', 'ProductController@show')->name('product.show');

    Auth::routes();

    Route::group(['middleware' => ['admin']], function () {
        Route::prefix('/admin')->group(function () {
            Route::get('/', 'AdminController@index')->name('admin');
        });
    });
});

Route::prefix('/shopping_cart')->group(function () {
    Route::get('/', 'ShoppingCartController@index')->name('shopping_cart')->middleware('order');

    //Ajax
    Route::post('/add', 'ShoppingCartController@add')->name('shopping_cart.add');

    Route::post('/update', 'ShoppingCartController@update')->name('shopping_cart.update');

    Route::post('/delete', 'ShoppingCartController@delete')->name('shopping_cart.delete');
});

