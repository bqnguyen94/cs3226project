<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\Restaurant;

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
        $restaurants = Restaurant::all();
        return view('foods')
        ->with('foods', $foods)->with('restaurants', $restaurants);
    }

    /*fuzzy find*/
    public function fuzzy(Request $request) {
        $query = $request->input('query');
        $array = array('chicken rice', 'chicken chop', 'fishball noodle', 'nasi lemak');
        return $this->fuzzyFind($query, $array);
        echo 'meh';
    }
    public function fuzzyFind($query, $array) {
        // no shortest distance found, yet
        //$result;
        //$count = 0;
        $shortest = -1;

        // loop through words to find the closest
        foreach ($array as $word) {

            // calculate the distance between the input word,
            // and the current word
            $lev = levenshtein($query, $word);

            // check for an exact match
            if ($lev == 0) {

                // closest word is this one (exact match)
                //$result[$count];
                //$count ++;
                $closest = $word;
                $shortest = 0;

                // break out of the loop; we've found an exact match
                break;
            }

            // if this distance is less than or equal 3
            //  OR if a next shortest word has not yet been found
            if ($lev <= 3 || $shortest < 0) {
                // set the closest match, and shortest distance
                //$result[$count];
                //$count ++;
                $closest  = $word;
                $shortest = $lev;
            }
        }
        echo "Input word: $query\n";
        //$finalresult;
        if ($shortest == 0) {
            echo "Exact match found: $closest\n";
            //$finalresult = $closest;
        } else {
            //$finalresult = $result;
            //foreach($result as $word) {
            //    echo "Did you mean: $word?\n";
            //}
            echo "Do you mean: $closest\n";
        }
        return $closest;
    }

}
