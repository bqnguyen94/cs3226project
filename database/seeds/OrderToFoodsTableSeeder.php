<?php

use Illuminate\Database\Seeder;

class OrderToFoodsTableSeeder extends Seeder
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

        $limit = 100;
        for ($i = 1; $i <= $limit; $i++) {
            $first_food = $faker->numberBetween($min = 1, $max = 50);
            $second_food = $first_food;
            while ($second_food == $first_food) {
                $second_food = $faker->numberBetween($min = 1, $max = 50);
            }
            DB::table('order_to_foods')->insert([
                'order_id' => $i,
                'food_id' => $first_food,
                'food_amount' => $faker->numberBetween($min = 1, $max = 3),
            ]);
            DB::table('order_to_foods')->insert([
                'order_id' => $i,
                'food_id' => $second_food,
                'food_amount' => $faker->numberBetween($min = 1, $max = 3),
            ]);
        }
    }
}
