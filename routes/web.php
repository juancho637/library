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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('comments', 'CommentController@create')->name('comments.create');
Route::post('comments', 'CommentController@store')->name('comments.store');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/', function () {
        return redirect()->route('services.index');
    });

    Route::resource('services', 'ServiceController');
    Route::get('comments', 'CommentController@index')->name('comments.index');
    Route::get('comments/{comment}', 'CommentController@show')->name('comments.show');
    Route::get('comments/{comment}/edit', 'CommentController@edit')->name('comments.edit');
    Route::put('comments/{comment}', 'CommentController@update')->name('comments.update');
    Route::delete('comments/{comment}', 'CommentController@destroy')->name('comments.destroy');
});
