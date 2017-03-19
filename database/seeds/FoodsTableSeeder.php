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
        $faker = Faker\Factory::create();

        $limit = 50;
        for ($i = 1; $i <= $limit; $i++) {
            $restaurant_id = $faker->numberBetween($min = 1, $max = 10);
            $name = "Food " . $i;
            $price = number_format($faker->numberBetween($min = 20, $max = 50) * 0.1, 2);
            Food::create([
                'restaurant_id' => $restaurant_id,
                'name' => $name,
                'price' => $price,
				'imgurl' => 'default'
            ]);
        }
		

//		 $temp1 = Food::create(array(
//            'restaurant_id'         => '1',
//            'name'         => 'Chicken Rice',
//            'price' => '2.50',
//			'imgurl' => 'default'
//        ));

    }
}
