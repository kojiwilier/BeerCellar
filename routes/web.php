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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/beers', 'BeerController@index')->name('beers');
Route::get('/beers/new', 'BeerController@new')->name('beers.new');
Route::post('/beers/new', 'BeerController@regist')->name('beers.regist');
Route::get('/beers/edit/{id}','BeerController@edit')->name('beers.edit');
Route::post('/beers/edit/{id}','BeerController@done')->name('beers.done');
Route::get('/beer/{id}','BeerController@detail')->name('beers.detail');

Route::get('/mybeers','BeerController@mybeers')->name('mybeers');
Route::post('/mybeer/regist/{beer_id}','BeerController@mybeer_regist');
Route::post('/mybeer/add/{beer_id}','BeerController@add')->name('beers.add');

Route::get('/myprofile','UserController@myprofile')->name('myprofile');
Route::post('/myprofile','UserController@regist')->name('profile.regist');
Route::get('/profile/{id}','UserController@profile')->name('profile');


Route::get('/myactions/{id}','ActionController@showMyAction')->name('myactions');
Route::post('/myactions/{id}','ActionController@addAction')->name('myactions.add');
