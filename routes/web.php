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
Route::get('/', ['as'=>'/', 'uses'=>'HomeController@index']);

Auth::routes();

Route::get('profile/{id}', 'UserController@profile');

Route::get('foods', 'FoodController@foods');

Route::get('orders', 'OrderController@orders');

Route::get('order/{id}', 'OrderController@order');

Route::get('cart', 'UserController@cart');

Route::post('cart', 'UserController@confirm_order');

Route::get('threads', 'MessageController@index');

Route::post('reply', 'MessageController@reply');

Route::get('messages/{id}', 'MessageController@messages');

Route::post('messages/{id}', 'MessageController@reply');

Route::get('refreshmessages/{id}', 'MessageController@refresh_messages');
