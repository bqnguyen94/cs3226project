<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'buyer_feedback','deliverer_feedback',
        'buyer_rates','deliverer_rates'
    ];

    public function deliverer(){
        $this->belongsTo('App\User');
    }

    public function buyer(){
        $this->belongsTo('App\User');
    }
}
