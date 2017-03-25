<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
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
                    ->where('user_id', $this->id)
                    ->first();
            if ($first_item) {
                $order = $user->cart_to_order($request->location);
                $deliverer = User::where('id', $order->deliverer_id)->first();
                return redirect()->to('/order/' . $order->id);
            }
        }

        return redirect()->to('/');
    }
}
