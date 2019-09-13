<?php

Route::get('/', 'PagesController@index');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('/profile', 'UsersController', ['except' => ['show', 'store', 'destroy', 'create']]);

Route::get('/admin', function () {
    return ('you are admin');
})->middleware(['auth', 'auth.admin']);


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
