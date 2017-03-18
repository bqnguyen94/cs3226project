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
Route::get('/', 'HomeController@index');
Route::get('/cancel', 'HomeController@cancel');
Route::get('/success', 'HomeController@success');
Route::get('/addtocart', 'HomeController@addtocart');
Route::get('/viewcart', 'HomeController@viewcart');

Auth::routes();

Route::get('profile', 'UserController@profile')->name('user.profile');

Route::get('foods', 'FoodController@foods');
