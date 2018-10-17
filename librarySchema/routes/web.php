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

Route::get('/show', function () {
    return view('show');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix'=> 'authors'], function() {
  Route::get('/', 'AuthorController@index')->name('author.index');
  Route::get('create', 'AuthorController@create')->name('author.create');
  Route::post('create', 'AuthorController@store')->name('author.store');
  Route::get('update/{id}', 'AuthorController@edit')->name('author.edit');
  Route::post('update/{id}', 'AuthorController@update')->name('author.update');
  Route::post('delete/{id}', 'AuthorController@destroy')->name('author.destroy');
});

Route::group(['prefix'=> 'books'], function() {
  Route::get('/', 'BookController@index')->name('book.index');
  Route::post('filter', 'BookController@filter')->name('book.filter');
  Route::get('create', 'BookController@create')->name('book.create');
  Route::post('create', 'BookController@store')->name('book.store');
  Route::get('update/{id}', 'BookController@edit')->name('book.edit');
  Route::post('update/{id}', 'BookController@update')->name('book.update');
  Route::post('delete/{id}', 'BookController@destroy')->name('book.destroy');

});
