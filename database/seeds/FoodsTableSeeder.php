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
    }
}
