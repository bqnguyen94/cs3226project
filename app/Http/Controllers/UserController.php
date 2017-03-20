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
    public function profile()
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $foods = Food::all();
            $users = User::all();
            return view('profile')
                    ->with('users', $users)
                    ->with('foods', $foods)
                    ->with('orders', $this->get_orders($id));
        } else {
            return redirect()->to('/');
        }

    }

    public function cart() {
        if (Auth::check()) {
            $user = Auth::user();
            $cart = $user->cart_get_foods();
            return view('cart')
                    ->with('cart', $cart);
        } else {
            return redirect()->to('/');
        }
    }

    public function add_to_cart($food_id, $amt) {
        if (Auth::check()) {
            $user = Auth::user();
            $user->update_cart($food_id, $amt);
        }
    }

    /**
     * Return the user's past transactions.
     *
     * @return Collection
     */
    private function get_orders($id) {
        $orders = Order::where('buyer_id', $id)
                            ->orWhere('deliverer_id', $id)
                            ->orderBy('created_at')
                            ->get();
        return $orders;
    }
}
