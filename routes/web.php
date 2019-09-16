<?php

// main site page routes
Route::get('/', 'PagesController@index'); // home page
Route::get('/suppliers', 'PagesController@suppliers'); // list of restaurants

// user routes
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');



Route::resource('/profile', 'UsersController', ['except' => ['show', 'store', 'destroy', 'create']]);

// **** NEED MIDDLEWARE FOR SUPPLIERS ONLY ******
Route::resource('/products', 'ProductsController', ['except' => ['show']]);

Route::middleware(['auth', 'auth.admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::resource('/users', 'Admin\UsersController');
});

Route::prefix('suppliers')->name('suppliers.')->group(function () {

    // id is user_id (supplier)
    Route::get('/{id}/products', 'ProductsController@productBySupplier');
});

Route::get('/markdown/{filename?}', function () {
    $filename = request('filename');
    return view('layouts.markdown')->with('filename', $filename);
});

Auth::routes();
