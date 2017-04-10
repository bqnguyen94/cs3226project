<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Offer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use Srmklive\PayPal\Services\AdaptivePayments;

class OrderController extends Controller
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
        if ($order && !$order->is_delivered && Auth::user()->id==$order->deliverer_id) {
            $order->is_delivered = true;
            $order->save();
            if ($order->is_received) {
                $this->payDeliverer($order);
            }
            Session::flash('alert-success', 'Delivery has been confirmed');
            return redirect()->route('order.deliverer-feedback', $order);
        } else {
            Session::flash('alert-danger', 'Ops something wrong happened!');
            return redirect()->to('/');
        }
    }

    public function confirmReceive(Order $order)
    {
        if ($order && !$order->is_received && Auth::user()->id==$order->buyer_id) {
            $order->is_received = true;
            $order->save();
            if ($order->is_delivered) {
                $this->payDeliverer($order);
            }
            Session::flash('alert-success', 'Receiving of food has been confirmed');
            return redirect()->route('order.buyer-feedback', $order);
        } else {
            Session::flash('alert-danger', 'Ops something wrong happened!');
            return redirect()->to('/');
        }
    }

    public function buyerFeedback(Order $order)
    {
        if (Auth::user()->id == $order->buyer_id && !$order->buyer_feedback && !$order->buyer_rating) {
            return view('order.buyer-feedback',compact('order'));
        } else {
            Session::flash('alert-danger', 'This action can\'t be performed');
            return redirect()->to('/');
        }
    }

    public function buyerFeedbackValidate(Request $request, Order $order){
        if(Auth::user()->id == $order->buyer_id && !$order->buyer_feedback && !$order->buyer_rating){
            $this->validate($request,[
                'buyer_feedback'=>'string|max:3000',
                'buyer_rating'=>'integer|min:1|max:5'
            ]);
            $order->buyer_feedback = $request->input('buyer_feedback');
            $order->buyer_rating = $request->input('buyer_rating');
            $order->save();
            Session::flash('alert-success', 'Feedback successfully saved');
            return redirect()->to('/order/'.$order->id);
        }else{
            Session::flash('alert-danger', 'This action can\'t be performed');
            return redirect()->to('/order/'.$order->id);
        }
    }


    public function delivererFeedback(Order $order)
    {
        if (Auth::user()->id == $order->deliverer_id && !$order->deliverer_feedback && !$order->deliverer_rating) {
            return view('order.deliverer-feedback',compact('order'));
        } else {
            Session::flash('alert-danger', 'This action can\'t be performed');
            return redirect()->to('/');
        }
    }

    public function delivererFeedbackValidate(Request $request, Order $order){
        if(Auth::user()->id == $order->deliverer_id && !$order->deliverer_feedback && !$order->deliverer_rating){
            $this->validate($request,[
                'deliverer_feedback'=>'string|max:3000',
                'deliverer_rating'=>'integer|min:1|max:5'
            ]);
            $order->deliverer_feedback = $request->input('deliverer_feedback');
            $order->deliverer_rating = $request->input('deliverer_rating');
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

    private function payDeliverer(Order $order) {
        $deliverer = User::where('id', $order->deliverer_id)->first();
        if ($deliverer) {
            $deliverer->balance = $deliverer->balance + $order->final_price;
            $deliverer->save();
        }
    }

    public function refresh_offers($id) {
        if (Auth::check()) {
            $order = Order::where('id', $id)->first();
            if ($order) {
                $offers = Offer::where('order_id', $order->id)->orderBy('price')->get();
                $data = array();
                $line = new \stdClass();
                foreach ($offers as $offer) {
                    $offerer = User::where('id', $offer->offerer_id)->first();
                    $line->offer_id = $offer->id;
                    $line->price = $offer->price;
                    $line->offerer_id = $offerer->id;
                    $line->offerer_name = $offerer->name;
                    $data[] = json_encode($line);
                }
                $jsonData = '{"results":[';
                $jsonData .= implode(",", $data);
                $jsonData .= ']}';
                return $jsonData;
            }
        }
    }
}
