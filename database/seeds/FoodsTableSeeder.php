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
        */
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
    }
}
