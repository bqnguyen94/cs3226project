<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }
	
	public function cancel()
    {
        return view('cancel');
    }
	
	public function success()
    {
        return view('success');
    }
	
	public function addtocart()
    {
        return view('addtocart');
    }
	
	public function viewcart()
    {
        return view('viewcart');
    }

}
