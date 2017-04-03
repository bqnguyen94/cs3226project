<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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

    public function order($id)
    {
        $order = Order::where('id', $id)->first();
        if (!$order) {
            return redirect()->to('/');
        }
        return view('order')->with('order', $order);
    }

    public function confirmDeliver(Order $order)
    {
        if (!$order->is_delivered && Auth::user()->id == $order->deliverer_id && $order->deliverer_id) {
            $order->is_delivered = true;
            $order->save();
            Session::flash('alert-success', 'Delivery has been confirmed');
        } else {
            Session::flash('alert-danger', 'Delivery has already been confirmed');
        }

        return redirect()->to('/order/' . $order->id);
    }

    public function confirmReceive(Order $order)
    {
        if (!$order->is_received && Auth::user()->id == $order->buyer_id && $order->deliverer_id) {
            $order->is_received = true;
            $order->save();
            Session::flash('alert-success', 'Receiving of food has been confirmed');
            return redirect()->route('order.buyer-feedback', $order);
        } else {
            Session::flash('alert-danger', 'Food has already been received');
            return redirect()->to('/order/' . $order->id);
        }
    }

    public function buyerFeedback(Order $order)
    {
        if (Auth::user()->id == $order->buyer_id) {
            return view('order.buyer-feedback',compact('order'));
        } else {
            return redirect()->to('/');
        }
    }

    public function buyerFeedbackValidate(Request $request, Order $order){
        if(Auth::user()->id == $order->buyer_id && !$order->buyer_feedback){
            $this->validate($request,[
                'buyer_feedback'=>'string|max:3000'
            ]);
            $order->buyer_feedback = $request->input('buyer_feedback');
            $order->save();
            Session::flash('alert-success', 'Feedback successfully saved');
            return redirect()->to('/order/'.$order->id);
        }else{
            Session::flash('alert-danger', 'This action can\'t be performed');
            return redirect()->to('/order/'.$order->id);
        }
    }

    public function unconfirmDeliver(Order $order)
    {
        //this is to unconfirm delivery, but is not used
        //Provided in case needed
        if (false) {
            $order->is_delivered = false;
            $order->save();
            Session::flash('alert-success', 'Delivery has been unconfirmed');
        }
        Session::flash('alert-danger', 'This is not allowed');
        return redirect()->to('/order/' . $order->id);
    }
}
