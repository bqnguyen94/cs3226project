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

Route::get('payouts', 'UserController@adminGetDelivererPayouts');

Route::get('payouts/pay/{id}', 'UserController@adminMakePaymentToUser');

//Route::get('payouts/pay', 'UserController@adminMakePaymentToUsers');

Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');

Route::get('profile/{id}', 'UserController@profile');

Route::post('profile/{id}', 'UserController@updatePaypal');

Route::get('foods', 'FoodController@foods');

Route::get('orders', 'OrderController@orders');

Route::get('order/{id}', 'OrderController@order');

Route::get('order/{id}/refresh', 'OrderController@refresh_offers');

Route::get('order/{id}/delete/', 'UserController@cancel_order');

Route::post('order/{id}/update', 'UserController@update_order_delivery_time');

Route::post('order/{order}/confirm-deliver',['as'=>'confirm.deliver','uses'=>'OrderController@confirmDeliver']);

Route::post('order/{order}/confirm-receive',['as'=>'confirm.receive','uses'=>'OrderController@confirmReceive']);

Route::get('order/{order}/buyer-feedback',['as'=>'order.buyer-feedback','uses'=>'OrderController@buyerFeedback']);

Route::post('order/{order}/buyer-feedback-validate',['as'=>'order.buyer-feedback-validate','uses'=>'OrderController@buyerFeedbackValidate']);

Route::get('order/{order}/deliverer-feedback',['as'=>'order.deliverer-feedback','uses'=>'OrderController@delivererFeedback']);

Route::post('order/{order}/deliverer-feedback-validate',['as'=>'order.deliverer-feedback-validate','uses'=>'OrderController@delivererFeedbackValidate']);

Route::post('order/{id}', 'UserController@accept_offer');

Route::get('order/{order_id}/confirmed/{offer_id}/', 'UserController@paymentListener');

Route::post('makeoffer/{id}', 'UserController@make_offer');

Route::post('foods', 'UserController@add_to_cart');

Route::get('cart', 'UserController@cart');

Route::post('cart', 'UserController@confirm_order');

Route::post('/cart/update', 'UserController@update_cart');

Route::post('/cart/delete', [
    'as' => 'cart.delete',
    'uses' => 'UserController@delete_from_cart',
    ]);

Route::post('/cart/clear', [
    'as' => 'cart.clear',
    'uses' => 'UserController@clear_cart',
    ]);

Route::get('threads', 'MessageController@index');

Route::get('chat/{id}', 'MessageController@chatWith');

Route::post('reply', 'MessageController@reply');

Route::get('messages/{id}', 'MessageController@messages');

Route::post('messages/{id}', 'MessageController@reply');

Route::get('refreshmessages/{id}', 'MessageController@refresh_messages');

Route::get('/about', function(){return view('about');});

Route::get('/help', function(){return view('help');});
