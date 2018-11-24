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

Route::get('comments/create', 'CommentController@create')->name('comments.create');
Route::post('comments', 'CommentController@store')->name('comments.store');

Route::post('subscribers', 'SubscriberController@store')->name('subscribers.store');

Route::get('books', 'BookController@index')->name('books.index');
//Route::get('books/{book}', 'BookController@show')->name('books.show');

Route::group(['prefix' => 'datatable'], function () {
    Route::resource('books', 'DataTable\BookController', ['only'=>['index'], 'as'=>'datatable']);
    Route::resource('subscribers', 'DataTable\SubscriberController', ['only'=>['index'], 'as'=>'datatable']);
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/', function () {
        return redirect()->route('services.index');
    });

    Route::resource('services', 'ServiceController', ['except'=>['show']]);

    Route::get('comments', 'CommentController@index')->name('comments.index');
    Route::get('comments/{comment}', 'CommentController@show')->name('comments.show');
    Route::get('comments/{comment}/edit', 'CommentController@edit')->name('comments.edit');
    Route::put('comments/{comment}', 'CommentController@update')->name('comments.update');
    Route::delete('comments/{comment}', 'CommentController@destroy')->name('comments.destroy');

    Route::get('books/create', 'BookController@create')->name('books.create');
    Route::post('books', 'BookController@store')->name('books.store');
    Route::get('books/{book}/edit', 'BookController@edit')->name('books.edit');
    Route::put('books/{book}', 'BookController@update')->name('books.update');
    Route::delete('books/{book}', 'BookController@destroy')->name('books.destroy');

    Route::get('subscribers', 'SubscriberController@index')->name('subscribers.index');
});
