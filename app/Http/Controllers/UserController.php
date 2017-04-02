<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
                    ->with('orders', $user->get_orders());
        }
        return redirect()->to('/');
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

    public function confirm_order(Request $request) {
        if (Auth::check()) {
            $user = Auth::user();
            $first_item = DB::table('user_to_foods')
                    ->where('user_id', $user->id)
                    ->first();
            if ($first_item) {
                $order = $user->cart_to_order($request->location);
                $deliverer = User::where('id', $order->deliverer_id)->first();
                return redirect()->to('/order/' . $order->id);
            }
        }

        return redirect()->to('/');
    }

    public function make_offer($id, Request $request) {
        if (Auth::check()) {
            $user = Auth::user();
            $order = Order::where('id', $id)->first();
            if ($order && !$order->deliverer_id && $order->buyer_id != $user->id) {
                $user->make_offer($order->id, $request->amount);
                return redirect()->back();
            }
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
                $user->accept_offer($offer->id);
                return redirect()->back();
            }
        }
    }
}
