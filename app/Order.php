<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'buyer_id','seller_id','food_id',
        'buyer_feedback','deliverer_feedback',
        'buyer_rates','deliverer_rates'
    ];
}
