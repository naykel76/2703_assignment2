<?php


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

/** -------------------------------------------------------------------------
 * SuppliersController
 * --------------------------------------------------------------------------
 */
Route::get('/', 'SuppliersController@suppliers'); // home
Route::get('/restaurants', 'SuppliersController@suppliers');
Route::get('restaurants/{supplier}/products', 'SuppliersController@productBySupplier');

// protected supplier only routes
Route::middleware(['auth', 'auth.supplier'])->prefix('supplier')->name('supplier.')->group(function () {

    Route::get('/orders', 'SuppliersController@ordersBySupplier')->name('orders');
    Route::get('/sales-history', 'OrdersController@salesHistory')->name('sales-history');
});

/** -------------------------------------------------------------------------
 * ProductsController (supplier access only)
 * --------------------------------------------------------------------------
 */
Route::resource('/products', 'ProductsController', ['except' => ['show', 'index']])->middleware(['auth', 'auth.supplier']);
Route::get('/products/most-popular', 'ProductsController@mostPopular')->name('products.most-popular');

/** -------------------------------------------------------------------------
 * OrdersController
 * --------------------------------------------------------------------------
 */
Route::resource('/orders', 'OrdersController', ['except' => ['index', 'create', 'destroy', 'update']]);
Route::get('/order-confirmed', 'OrdersController@orderConfirmed')->name('orders.confirmed');

/** -------------------------------------------------------------------------
 * Administrator Routes
 * --------------------------------------------------------------------------
 */
Route::middleware(['auth', 'auth.admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::patch('/approve-supplier', 'Admin\DashboardController@approveSupplier')->name('approve-supplier');
});

/** -------------------------------------------------------------------------
 * CartController
 * --------------------------------------------------------------------------
 */
Route::post('/add-cart/{product}', 'CartController@addToCart')->name('products.addCart');
Route::get('/clear-cart', 'CartController@clearCart')->name('clear-cart');
Route::get('/reduce/{id}', 'CartController@reduceByOne')->name('products.reduce');
Route::get('/increase/{id}', 'CartController@increaseByOne')->name('products.increase');
Route::get('/remove-item/{id}', 'CartController@removeItem')->name('products.remove');


Auth::routes();


// Route::resource('/profile', 'UsersController', ['except' => ['show', 'store', 'destroy', 'create']]);

Route::get('/markdown/{filename?}', function () {
    $filename = request('filename');
    return view('layouts.markdown')->with('filename', $filename);
});
