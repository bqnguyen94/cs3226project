<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;

class FoodController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the food dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function foods()
    {
        $foods = Food::all();
        return view('foods')
                ->with('foods', $foods);
    }

}
