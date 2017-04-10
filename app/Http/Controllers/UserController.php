<?php

namespace App\Http\Controllers;

use Srmklive\PayPal\Services\AdaptivePayments;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Omnipay\Omnipay;
use Illuminate\Support\Facades\Session;
use App\Order;
use App\Offer;
use App\Food;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $target = User::where('id', $id)->first();
            if (!$target) {
                return redirect()->to('/');
            }
            $foods = Food::all();
            $users = User::all();
            return view('profile')
                    ->with('target', $target)
                    ->with('users', $users)
                    ->with('foods', $foods)
                    ->with('orders', $target->get_orders());
        }
        return redirect()->to('/');
    }

    public function updatePaypal($id, Request $request) {
        if (Auth::check() && Auth::user()->id == $id) {
            if ($request->paypal) {
                $this->validate($request, [
                    'paypal' => 'email',
                ]);
                Auth::user()->paypal = $request->paypal;
            } else {
                Auth::user()->paypal = null;
            }
            Auth::user()->save();
            Session::flash('alert-success', 'Your Paypal account is successfully updated!');
        }
        return redirect()->back();
    }

    public function cart() {
        if (Auth::check()) {
            $user = Auth::user();
            $cart = $user->cart_get_foods();
            return view('cart')
                    ->with('cart', $cart);
        }
        return redirect()->to('/');
    }

    public function add_to_cart(Request $request) {
        if (Auth::check()) {
            $user = Auth::user();
            $food_id = $request->food_id;
            $user->add_to_cart($food_id);
            return redirect()->to('/cart');
        }
        return redirect()->to('/');
    }

    public function update_cart(Request $request) {
        if (Auth::check()) {
            $user = Auth::user();
            $food_id = $request->food_id;
            $amount = $request->amount;
            $user->update_cart($food_id, $amount);

            $jsonData = '{"price":"' . $user->cart_get_total_price() . '"}';
            return $jsonData;
        }
    }

    public function delete_from_cart(Request $request) {
        if (Auth::check() && $request->food_id) {
            Auth::user()->delete_from_cart($request->food_id);
            Session::flash('alert-success', 'Item is removed from your cart.');
        }
        return redirect()->back();
    }

    public function clear_cart(Request $request) {
        if (Auth::check()) {
            Auth::user()->clear_cart();
            Session::flash('alert-success', 'Your cart has been cleared.');
        }
        return redirect()->back();
    }

    public function confirm_order(Request $request) {
        if (Auth::check()) {
            $this->validate($request,[
               'location' => 'max:100|string|required',
                'delivery_time'=>'date_format:m/d/Y H:i:s|required'
            ]);
            $user = Auth::user();
            $first_item = DB::table('user_to_foods')
                    ->where('user_id', $user->id)
                    ->first();
            if ($first_item) {
                $order = $user->cart_to_order($request->location,$request->input('delivery_time'));
                $deliverer = User::where('id', $order->deliverer_id)->first();
                return redirect()->to('/order/' . $order->id);
            }
        }

        return redirect()->to('/');
    }

    public function cancel_order($id) {
        if (Auth::check()) {
            $user = Auth::user();
            $order = Order::where('id', $id)->first();
            if ($order && $user->id == $order->buyer_id) {
                $order->delete();
                Session::flash('alert-success', 'Order is cancelled.');
            }
            return redirect()->to('/');
        }
    }

    public function make_offer($id, Request $request) {
        if (Auth::check()) {
            $user = Auth::user();
            $order = Order::where('id', $id)->first();
            if ($order && !$order->deliverer_id && $order->buyer_id != $user->id
                    && $request->amount <= 1000 && $request->amount >= 0) {
                $user->make_offer($order->id, $request->amount);
                Session::flash('alert-success', 'Offer made!');
            } else {
                Session::flash('alert-error', 'You are not allowed to do that!');
            }
            return redirect()->back();
        }
    }

    public function accept_offer($id, Request $request) {
        if (Auth::check()) {
            $user = Auth::user();
            $order = Order::where('id', $id)->first();
            $offer = Offer::where('id', $request->offer_id)->first();
            if ($order && $offer
                        && !$order->deliverer_id
                        && $offer->order_id == $order->id
                        && $order->buyer_id == $user->id) {
                $this->processPayment($order, $offer);

                //return redirect()->back();
            }
        }
    }

    private function processPayment($order, $offer) {
        $params = array(
            'cancelUrl'=>'https://nusfood.com/',
            'returnUrl'=>'https://nusfood.com/order/' . $order->id . '/confirmed/' . $offer->id . '/',
            'amount' =>  $offer->price,
            'currency' => 'SGD'
        );

        Session::put('params', $params);
        Session::save();

        $gateway = Omnipay::create('PayPal_Express');
        $gateway->setUsername('jhcs_api1.hotmail.sg');
        $gateway->setPassword('VG4ESKFEJ4SLNUL4');
        $gateway->setSignature('AFcWxV21C7fd0v3bYYYRCpSSRl31APrilmu6WQdlaXAQvK6TlJEB-AfH');
        //$gateway->setTestMode(true);

        $response = $gateway->purchase($params)->send();
        if ($response->isRedirect()) {
            $response->redirect();
        } else {
            // payment failed: display message to customer
            echo $response->getMessage();
        }
    }

    public function paymentListener($order_id, $offer_id) {
        $order = Order::where('id', $order_id)->first();
        $offer = Offer::where('id', $offer_id)->first();
        if ($order && $offer) {
            $gateway = Omnipay::create('PayPal_Express');
            $gateway->setUsername('jhcs_api1.hotmail.sg');
            $gateway->setPassword('VG4ESKFEJ4SLNUL4');
            $gateway->setSignature('AFcWxV21C7fd0v3bYYYRCpSSRl31APrilmu6WQdlaXAQvK6TlJEB-AfH');
            //$gateway->setTestMode(true);

            $params = Session::get('params');
            $response = $gateway->completePurchase($params)->send();
            $paypalResponse = $response->getData(); // this is the raw response object

            if(isset($paypalResponse['PAYMENTINFO_0_ACK']) && $paypalResponse['PAYMENTINFO_0_ACK'] === 'Success') {
                Auth::user()->accept_offer($offer->id);
                Session::flash('alert-success', 'Payment is successful!');
            } else {
                Session::flash('alert-error', 'Payment is unsuccessful!');
            }
            return redirect()->to('/order/' . $order->id);
        }
    }

    public function adminGetDelivererPayouts() {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == User::ROLE_ADMIN) {
                $users = User::where('balance', '<>', 0)->get();
                return view('payouts')->with('users', $users);
            }
        }
        Session::flash('alert-error', 'You are not allowed to see this!');
        return redirect()->to('/');
    }

    public function adminMakePaymentToUser($id) {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == User::ROLE_ADMIN) {
                $target = User::where('id', $id)->first();
                $target->balance = 0;
                $target->save();
                Session::flash('alert-success', 'Paid ' . $target->name . '!');
                return redirect()->back();
            }
        }
        Session::flash('alert-error', 'You are not allowed to see this!');
        return redirect()->to('/');
    }
/*
    public function adminMakePaymentToUsers() {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == User::ROLE_ADMIN) {
                $targets = User::where('balance', '<>', 0)->get();
                $this->handlePayment($targets);
            }
        }
        Session::flash('alert-error', 'You are not allowed to see this!');
        return redirect()->to('/');
    }

    private function handlePayment($targets) {
        $provider = new AdaptivePayments;
        $receivers = [];
        $isPrimary = true;
        foreach ($targets as $target) {
            $receiver[] = [
                'email' => $target->email,
                'amount' => $target->balance,
                'primary' => true,
            ];
        }
        $data = [
            'receivers'  => $receivers,
            'payer' => 'SENDER', // (Optional) Describes who pays PayPal fees. Allowed values are: 'SENDER', 'PRIMARYRECEIVER', 'EACHRECEIVER' (Default), 'SECONDARYONLY'
            'return_url' => url('adminpayment/success/'),
            'cancel_url' => url('/'),
        ];
        $response = $provider->createPayRequest($data);
        $redirect_url = $provider->getRedirectUrl('approved', $response['payKey']);

        return redirect($redirect_url);
    }
*/
}
