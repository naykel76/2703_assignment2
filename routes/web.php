<?php

// main site page routes
Route::get('/', 'PagesController@index'); // home page
Route::get('/test', 'PagesController@test'); // home page
Route::get('/suppliers', 'PagesController@suppliers'); // list of restaurants

// user routes
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Order routes
Route::resource('/orders', 'OrdersController', ['except' => ['index', 'create', 'destroy', 'update']]);
Route::get('/order-confirmed', 'OrdersController@orderConfirmed')->name('orders.confirmed');


// Route::get('/orders/confirmed', 'OrdersController@confirmed');

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

Route::prefix('suppliers')->name('suppliers.')->group(function () {

    // id is user_id (supplier)
    Route::get('/{id}/products', 'ProductsController@productBySupplier');
});

Route::resource('/profile', 'UsersController', ['except' => ['show', 'store', 'destroy', 'create']]);
Route::get('/markdown/{filename?}', function () {
    $filename = request('filename');
    return view('layouts.markdown')->with('filename', $filename);
});

Auth::routes();


// // add order item to cart session data
// public function addToCart(Request $request)
// {
//     // $request->session()->put('key', 'value');

//     // dd('qwewqe');
//     dd($request->session->get('key'));
//     // return redirect('suppliers/3/products');
// }



// Route::get('/test', function () {

//     // $data = [ ];

//     // write to session
//     // session(['name' => 'Billy']);

//     return session('name');


//     return view('test');
//     // return view('test')->with($data);
// });
