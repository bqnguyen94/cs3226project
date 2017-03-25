<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the order dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function orders()
    {
        $orders = Order::all();
        return view('orders')
                ->with('orders', $orders);
    }

    public function order($id) {
        $order = Order::where('id', $id)->first();
        $buyer = User::where('id', $order->buyer_id)->first();
        $deliverer = User::where('id', $order->deliverer_id)->first();
        return view('order')
                ->with('buyer', $buyer)
                ->with('deliverer', $deliverer)
                ->with('order', $order);
    }
}
