<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Food;
use App\Order;
use App\Thread;

class User extends Authenticatable
{
    use Notifiable;

    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;
    const ROLE_MODERATOR = 3;

    public static $roles = [
        self::ROLE_USER=>'User',
        self::ROLE_ADMIN=>'Admin',
        self::ROLE_MODERATOR=>'Moderator',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','role', 'password', 'activated',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders(){
        $this->hasMany('App\Order');
    }

    /**
     * Return the user's past transactions.
     *
     * @return Collection
     */
    public function get_orders() {
        $orders = Order::where('buyer_id', $this->id)
                            ->orWhere('deliverer_id', $this->id)
                            ->orderByDesc('created_at')
                            ->get();
        return $orders;
    }

    public function cart_get_foods() {
        $user_to_foods = DB::table('user_to_foods')
                ->where('user_id', $this->id)
                ->get();
        $cart = array();
        foreach ($user_to_foods as $user_to_food) {
            $cart[] = [
                'food_id' => $user_to_food->food_id,
                'food' => Food::where('id', $user_to_food->food_id)->first(),
                'amount' => $user_to_food->food_amount,
            ];
        }
        return $cart;
    }

    public function cart_get_total_price() {
        $cart = $this->cart_get_foods();
        $sum = 0;
        foreach($cart as $cart_item) {
            $sum += $cart_item['food']->price * $cart_item['amount'];
        }
        return number_format($sum, 2);;
    }

    public function add_to_cart($food_id) {
        $user_to_food = DB::table('user_to_foods')
                ->where('user_id', $this->id)
                ->where('food_id', $food_id)
                ->first();
        if (!$user_to_food) {
            DB::table('user_to_foods')
                ->insert([
                    'user_id' => $this->id,
                    'food_id' => $food_id,
                ]);
        } else {
            DB::table('user_to_foods')
                    ->where('user_id', $this->id)
                    ->where('food_id', $food_id)
                    ->update(['food_amount' => $user_to_food->food_amount + 1]);
        }
    }

    public function update_cart($food_id, $amt) {
        $user_to_food = DB::table('user_to_foods')
                ->where('user_id', $this->id)
                ->where('food_id', $food_id)
                ->first();
        if ($user_to_food) {
            DB::table('user_to_foods')
                    ->where('user_id', $this->id)
                    ->where('food_id', $food_id)
                    ->update(['food_amount' => $amt]);
        }
    }

    public function delete_from_cart($food_id) {
        $user_to_food = DB::table('user_to_foods')
                ->where('user_id', $this->id)
                ->where('food_id', $food_id)
                ->first();
        if ($user_to_food) {
            DB::table('user_to_foods')
                    ->where('user_id', $this->id)
                    ->where('food_id', $food_id)
                    ->delete();
        }
    }

    public function clear_cart() {
        DB::table('user_to_foods')
                ->where('user_id', $this->id)
                ->delete();
    }

    public function cart_to_order($location, $deliveryTime) {
        $user_to_foods = DB::table('user_to_foods')
                ->where('user_id', $this->id)
                ->get();
        $deliveryTime = Carbon::createFromFormat('m/d/Y g:i A',$deliveryTime)->format('Y-m-d H:i:s');
        $order = Order::create([
            'buyer_id' => $this->id,
            'deliver_location' => $location,
            'delivery_time' => $deliveryTime,
        ]);
        foreach ($user_to_foods as $user_to_food) {
            DB::table('order_to_foods')
                ->insert([
                    'order_id' => $order->id,
                    'food_id' => $user_to_food->food_id,
                    'food_amount' => $user_to_food->food_amount,
                ]);
        }
        $this->clear_cart();
        return $order;
    }

    public function get_all_threads() {
        $threads = Thread::where('first_user_id', $this->id)
                        ->orWhere('second_user_id', $this->id)
                        ->get();
        return $threads;
    }

    public function make_offer($order_id, $amt) {
        $order = Order::where('id', $order_id)->first();
        if ($order && $order->delivery_time >= Carbon::now()->subMinutes(30)) {
            $offer = Offer::where('order_id', $order_id)
                    ->where('offerer_id', $this->id)
                    ->first();
            if (!$offer) {
                $offer = Offer::create([
                    'order_id' => $order_id,
                    'offerer_id' => $this->id,
                    'price' => $amt,
                ]);
            } else {
                $offer->price = $amt;
                $offer->save();
            }
        }
    }

    public function accept_offer($offer_id) {
        $offer = Offer::where('id', $offer_id)->first();
        if ($offer) {
            $order = Order::where('id', $offer->order_id)->first();
            if ($order && $order->buyer_id == $this->id && $order->delivery_time >= Carbon::now()->subMinutes(30)) {
                $order->deliverer_id = $offer->offerer_id;
                $order->final_price = $offer->price;
                $order->save();
                Offer::where('order_id', $order->id)->delete();
            }
        }
    }
}
