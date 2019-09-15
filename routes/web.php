<?php

Route::get('/', 'PagesController@index');
Route::get('/test', 'PagesController@test')->middleware(['auth']);

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('/profile', 'UsersController', ['except' => ['show', 'store', 'destroy', 'create']]);

Route::middleware(['auth', 'auth.admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::resource('/users', 'Admin\UsersController');
});


/** -------------------------------------------------------------------------
 * Render Markdown with parsedown
 * --------------------------------------------------------------------------
 * Save file in the public directory and pass filename to view
 * <a href="/markdown/?filename=example.md">Example Markdown</a>
 */

Route::get('/markdown/{filename?}', function () {
    $filename = request('filename');
    return view('layouts.markdown')->with('filename', $filename);
});

Auth::routes();
