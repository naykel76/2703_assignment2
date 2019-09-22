<?php

// main site page routes
Route::get('/', 'PagesController@index'); // home page
Route::get('/suppliers', 'PagesController@suppliers'); // list of restaurants

// user routes
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Order routes
Route::resource('/orders', 'OrdersController', ['except' => ['index', 'create', 'destroy', 'update']]);
Route::get('/order-confirmed', 'OrdersController@orderConfirmed')->name('orders.confirmed');

// Product routes
Route::resource('/products', 'ProductsController', ['except' => ['show', 'index']]);

// Cart routes
Route::post('/add-cart/{product}', 'CartController@addToCart')->name('products.addCart');
Route::get('/reduce/{id}', 'CartController@reduceByOne')->name('products.reduce');
Route::get('/increase/{id}', 'CartController@increaseByOne')->name('products.increase');
Route::get('/remove-item/{id}', 'CartController@removeItem')->name('products.remove');

Route::middleware(['auth', 'auth.admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::resource('/users', 'Admin\UsersController');
});

Route::get('suppliers/{id}/products', 'ProductsController@productBySupplier');

// supplier only routes
Route::middleware(['auth', 'auth.supplier'])->prefix('supplier')->name('supplier.')->group(function () {

    Route::get('/orders', 'OrdersController@ordersBySupplier')->name('orders');
});

Route::resource('/profile', 'UsersController', ['except' => ['show', 'store', 'destroy', 'create']]);
Route::get('/markdown/{filename?}', function () {
    $filename = request('filename');
    return view('layouts.markdown')->with('filename', $filename);
});

Auth::routes();
