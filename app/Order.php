<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Food;

class Order extends Model
{
    //
    protected $fillable = [
        'buyer_id','deliverer_id',
        'buyer_feedback','deliverer_feedback',
        'buyer_rates','deliverer_rates',
        'deliver_location', 'final_price',
    ];

    public function deliverer(){
        $this->belongsTo('App\User');
    }

    public function buyer(){
        $this->belongsTo('App\User');
    }

    public function get_all_foods_with_details() {
        $order_to_foods = DB::table('order_to_foods')
                ->where('order_id', $this->id)
                ->get();
        $foods = array();
        foreach ($order_to_foods as $order_to_food) {
            $foods[] = [
                'food' => Food::where('id', $order_to_food->food_id)->first(),
                'amount' => $order_to_food->food_amount,
            ];
        }
        return $foods;
    }

    public function get_total_food_price() {
        $sum = 0;
        $order_to_foods = $order_to_foods = DB::table('order_to_foods')
                ->where('order_id', $this->id)
                ->get();
        foreach ($order_to_foods as $order_to_food) {
            $sum += Food::where('id', $order_to_food->food_id)
                    ->first()->price
                    *
                    $order_to_food->food_amount;
        }
        return number_format($sum, 2);
    }
}
