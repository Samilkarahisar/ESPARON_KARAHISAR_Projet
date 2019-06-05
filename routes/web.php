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

    Route::get('/products/{productCategoryId}', 'ProductController@index')->name('product');

    Route::prefix('/client')->group(function () {
        Route::get('/fill_addresses', 'ClientController@fillAddresses')->name('client.fill_addresses');
        Route::post('/post_fill_addresses','ClientController@postFillAddresses')->name('client.post_fill_addresses');
    });

    Route::prefix('/payment_method')->group(function () {
        Route::get('/', 'PaymentMethodController@index')->name('payment_method');
        Route::get('/paypal', 'PaymentMethodController@paypal')->name('payment_method.paypal');
        Route::get('/credit_card', 'PaymentMethodController@creditCard')->name('payment_method.credit_card');
        Route::get('/bill', 'PaymentMethodController@bill')->name('payment_method.bill');
        Route::post('/success', function () {
            return view('payment_method.success');
        })->name('payment_method.success');
    });

    Route::get('/product/{productId}', 'ProductController@show')->name('product.show');

    Auth::routes();

    Route::group(['middleware' => ['admin']], function () {
        Route::prefix('/admin')->group(function () {
            Route::get('/', 'AdminController@index')->name('admin');
            //Ajax
            Route::post('/confirm', 'AdminController@confirm')->name('admin.confirm');
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

