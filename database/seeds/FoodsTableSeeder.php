<?php

use Illuminate\Database\Seeder;
use App\Food;
use Faker\Factory;

class FoodsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        //
        /*
        $faker = Faker\Factory::create();

        $limit = 50;
        for ($i = 1; $i <= $limit; $i++) {
            $restaurant_id = $faker->numberBetween($min = 1, $max = 10);
            $name = "Food " . $i;
            $price = number_format($faker->numberBetween($min = 20, $max = 50) * 0.1, 2);
            Food::create([
                'restaurant_id' => $restaurant_id,
                'name' => $name,
                'price' => $price
            ]);
        }
<<<<<<< HEAD
        // Business Canteen Korean Food Stall ID = 1
        Food::create([
            'restaurant_id' => '1',
            'name' => 'Doeji Bulgogi',
            'price' => '4',
            'image' => "/img/food/biz-01.jpg",
        ]);

        Food::create([
            'restaurant_id' => '1',
            'name' => 'Dak Bulgogi',
            'price' => '4',
            'image' => "/img/food/biz-02.jpg",
        ]);

        Food::create([
            'restaurant_id' => '1',
            'name' => 'Bulgogi',
            'price' => '4.5',
            'image' => "/img/food/biz-03.jpg",
        ]);

        Food::create([
            'restaurant_id' => '1',
            'name' => 'Saba',
            'price' => '4.5',
            'image' => "/img/food/biz-04.jpg",
        ]);

        Food::create([
            'restaurant_id' => '2',
            'name' => 'Braised Beef Noodle',
            'price' => '5.0',
            'image' => "/img/food/utown-01.jpg",
        ]);

        Food::create([
            'restaurant_id' => '2',
            'name' => 'Egg fried rice w pork chop',
            'price' => '4.5',
            'image' => "/img/food/utown-02.jpg",
        ]);

        Food::create([
            'restaurant_id' => '2',
            'name' => 'Braised Pork Noodle',
            'price' => '4',
            'image' => "/img/food/utown-03.jpg",
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Golden Cereal Fried Rice',
            'price' => '3.5',
            'image' => "/img/food/utown-04.jpg",
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Kong Bao Chicken with Rice',
            'price' => '4.5',
            'image' => "/img/food/utown-05.jpg",
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Claypot Braised Tofu Set',
            'price' => '4.5',
            'image' => "/img/food/utown-06.jpg",
        ]);

        Food::create([
            'restaurant_id' => '4',
            'name' => 'Chicken Rice',
            'price' => '2.3',
            'image' => "/img/food/biz-chickenRice.jpg",
        ]);

        Food::create([
            'restaurant_id' => '4',
            'name' => 'Char Siew Rice',
            'price' => '2.3',
            'image' => "/img/food/biz-charSiewRice.jpg",
        ]);

        Food::create([
            'restaurant_id' => '5',
            'name' => 'Chicken Katsu Curry Rice',
            'price' => '3.5',
            'image' => "/img/food/biz-chickenKatsu.jpg",
        ]);

        Food::create([
            'restaurant_id' => '5',
            'name' => 'Oyako Rice',
            'price' => '3.5',
            'image' => "/img/food/biz-oyakoRice.jpg",
        ]);

        Food::create([
            'restaurant_id' => '6',
            'name' => 'Steamed Chicken Set',
            'price' => '4.2',
            'image' => "/img/food/utown-steamedChicken.jpg",
        ]);

        Food::create([
            'restaurant_id' => '6',
            'name' => 'Sotong Panggang Set',
            'price' => '5.5',
            'image' => "/img/food/utown-sotong.jpg",
        ]);

        Food::create([
            'restaurant_id' => '6',
            'name' => 'Ayam Penyet Set',
            'price' => '5',
            'image' => "/img/food/utown-ayamPenyet.jpg",
        ]);

        // Science Canteen Ayam Penyet Food Stall ID = 2
        Food::create([
            'restaurant_id' => '2',
            'name' => 'Ayam Penyet Set',
            'price' => '4.30'
        ]);

        Food::create([
            'restaurant_id' => '2',
            'name' => 'Ikan Dory Penyet Set',
            'price' => '5'
        ]);

        Food::create([
            'restaurant_id' => '2',
            'name' => 'Ikan Grouper Penyet Set',
            'price' => '4.50'
        ]);

        Food::create([
            'restaurant_id' => '2',
            'name' => 'Udang Penyet Set',
            'price' => '4.30'
        ]);

        Food::create([
            'restaurant_id' => '2',
            'name' => 'Steamed Chicken Set',
            'price' => '3.30'
        ]);

        Food::create([
            'restaurant_id' => '2',
            'name' => 'Spicy Lemon Grass Chicken Set',
            'price' => '3.30'
        ]);

        Food::create([
            'restaurant_id' => '2',
            'name' => 'Bakso Soup',
            'price' => '2.50'
        ]);

        Food::create([
            'restaurant_id' => '2',
            'name' => 'Crackers',
            'price' => '1'
        ]);

        Food::create([
            'restaurant_id' => '2',
            'name' => 'Chicken Wing (1pc)',
            'price' => '1.30'
        ]);

        Food::create([
            'restaurant_id' => '2',
            'name' => 'Vegetables',
            'price' => '0.5'
        ]);

        // Science Canteen Western Food Stall ID = 3

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Chicken Chop',
            'price' => '3'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Black Pepper Chicken Chop',
            'price' => '3.20'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Black Pepper Steak',
            'price' => '3.40'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Grilled Sirloin Steak (N.Z.) With Black Pepper Sauce',
            'price' => '5.80'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Grilled Ribeye Steak (N.Z.) With Herbs Sauce',
            'price' => '5.80'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Grilled Chicken Served With Red Wine Mushroom Sauce',
            'price' => '4'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Grilled Lamb Shoulder Served With Garlic Sauce',
            'price' => '4'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Panseared Dory Fillet With Citrus Butter Sauce',
            'price' => '4'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Chicken Cutlet',
            'price' => '3'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Fish & Chips',
            'price' => '3'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Deep Fried Breaded Chicken Fillet With Cheddar Cheese Sauce',
            'price' => '4'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Mixed Garden Green',
            'price' => '1.80'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Egg Salad',
            'price' => '2'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Chicken Salad',
            'price' => '2.60'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Mango Chicken Salad',
            'price' => '3.50'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => "Chef's Salad",
            'price' => '4'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Cheesy Fries',
            'price' => '2'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => "Chicken Nugget (5pcs)",
            'price' => '1.50'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Chicken Popcorn',
            'price' => '2'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => "Fries",
            'price' => '1'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Fried Egg',
            'price' => '0.5'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => "Spaghetti Arrabbiata",
            'price' => '2'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Spaghetti Beef Bolognese',
            'price' => '2.50'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => "Spaghetti Carbonara",
            'price' => '2.80'
        ]);

        Food::create([
            'restaurant_id' => '3',
            'name' => 'Spaghetti Arrabbiata With Chicken',
            'price' => '3'
        ]);
    }
}
