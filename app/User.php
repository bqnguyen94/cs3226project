<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use App\Food;
use App\Order;

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
        'name', 'email','role', 'password',
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

    public function cart_get_foods() {
        $user_to_foods = DB::table('user_to_foods')
                ->where('user_id', $this->id)
                ->get();
        $cart = array();
        foreach ($user_to_foods as $user_to_food) {
            $cart[] = [
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
                ->andWhere('food_id', $food_id)
                ->first();
        if (!$user_to_food) {
            DB::table('user_to_foods')
                ->insert([
                    'user_id' => $this->id,
                    'food_id' => $food_id,
                ]);
        }
    }

    public function update_cart($food_id, $amt) {
        $user_to_food = DB::table('user_to_foods')
                ->where('user_id', $this->id)
                ->andWhere('food_id', $food_id)
                ->first();
        if ($user_to_food) {
            $user_to_food->update([
                'food_amount' => $amt
            ]);
        }
    }

    public function cart_to_order() {
        $user_to_foods = DB::table('user_to_foods')
                ->where('user_id', $this->id)
                ->get();
        $order = Order::create([
            'buyer_id' => $this->id,
        ]);
        foreach ($user_to_foods as $user_to_food) {
            DB::table('order_to_foods')
                ->insert([
                    'order_id' => $order->id,
                    'food_id' => $user_to_food->food_id,
                    'food_amount' => $user_to_food->food_amount,
                ]);
            $user_to_food->delete();
        }
    }
}
