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

Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');

Route::get('profile/{id}', 'UserController@profile');

Route::get('foods', 'FoodController@foods');

Route::get('orders', 'OrderController@orders');

Route::get('order/{id}', 'OrderController@order');

Route::post('order/{order}/confirm-deliver',['as'=>'confirm.deliver','uses'=>'OrderController@confirmDeliver']);

Route::post('order/{id}', 'UserController@accept_offer');

Route::post('makeoffer/{id}', 'UserController@make_offer');

Route::post('foods', 'UserController@add_to_cart');

Route::get('cart', 'UserController@cart');

Route::post('cart', 'UserController@confirm_order');

Route::get('threads', 'MessageController@index');

Route::get('chat/{id}', 'MessageController@chatWith');

Route::post('reply', 'MessageController@reply');

Route::get('messages/{id}', 'MessageController@messages');

Route::post('messages/{id}', 'MessageController@reply');

Route::get('refreshmessages/{id}', 'MessageController@refresh_messages');

Route::get('/contact', function(){return view('contact');});

Route::get('/about', function(){return view('about');});

Route::get('/help', function(){return view('help');});
