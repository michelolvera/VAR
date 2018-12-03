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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('config', 'ConfigController@edit');
Route::put('config', 'ConfigController@update');
Route::get('comment', 'CommentController@index');
Route::post('comment/{product}', 'CommentController@store');
Route::post('comment/replie/{comment}', 'CommentController@store_replie');
Route::delete('comment/{comment}', 'CommentController@delete');

Route::resource('countrie', 'CountrieController');
Route::resource('state', 'StateController');
Route::resource('categorie', 'CategorieController');
Route::resource('subcategorie', 'SubcategorieController');
Route::resource('product', 'ProductController');
Route::resource('slide', 'SlidesController');
