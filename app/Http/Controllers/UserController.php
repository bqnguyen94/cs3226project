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
            redirect::to('/');
        }

    }

    public function yada(){
        $buyer = User::where('id',1)->first();
        $seller = User::where('id',2)->first();
        $food = Food::where('id',1)->first();
        $order = Order::create([
            'buyer_id'=>$buyer,
            'seller_id'=>$seller
        ]);
        
        redirect::to('/')->with(compact('order'));
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
