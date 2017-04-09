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
            'image' => "https://www.thefooddictator.com/wp-content/uploads/2016/02/image-18.jpeg",
        ]);

        Food::create([
            'restaurant_id' => '1',
            'name' => 'Dak Bulgogi',
            'price' => '4',
            'image' => "http://4.bp.blogspot.com/_UIXOn06Pz70/S85COq9tHxI/AAAAAAAAKCg/-BTJ3EX9vtA/s800/Pineapple+Dak+Bulgogi+(Pineapple+Korean+BBQ+Chicken)+3+500.jpg",
        ]);

        Food::create([
            'restaurant_id' => '1',
            'name' => 'Bulgogi',
            'price' => '4.5',
            'image' => "http://www.trifood.com/image/food/bulgogi.JPG",
        ]);

        Food::create([
            'restaurant_id' => '1',
            'name' => 'Saba',
            'price' => '4.5',
            'image' => "https://s3.burpple.com/foods/32a0a832d69a0d7312770605_original.?1376242530",
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
