<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    //
    protected $fillable = [
        'name','location'
    ];

    public function foods(){
        $this->hasMany('App\Food');
    }
}
