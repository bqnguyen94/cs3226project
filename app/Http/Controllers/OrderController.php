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
        if (!$order) {
            return redirect()->to('/');
        }
        return view('order')->with('order', $order);
    }
    
    public function confirmDeliver(Order $order){
        //todo
        //authorization
        $order->is_delivered = true;
        $order->save();
        Session::flash('alert-success','Delivery has been confirmed');
        return redirect()->route('order',$order->id);
    }

    public function unconfirmDeliver(Order $order){
        //todo
        // authorization
        $order->is_delivered = false;
        $order->save();
        Session::flash('alert-success','Delivery has been unconfirmed');
        return redirect()->route('order',$order->id);
    }
}
