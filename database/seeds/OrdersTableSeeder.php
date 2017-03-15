<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrdersTableSeeder extends Seeder
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

        $limit = 30;
        for ($i = 0; $i < $limit; $i++) {
            $buyer_id = $faker->numberBetween($min = 1, $max = 10);
            $deliverer_id = $buyer_id;
            while ($deliverer_id == $buyer_id) {
                $deliverer_id = $faker->numberBetween($min = 1, $max = 10);
            }
            $food_id = $faker->numberBetween($min = 1, $max = 50);

            Order::create([
                'buyer_id' => $buyer_id,
                'deliverer_id' => $deliverer_id,
                'food_id' => $food_id,
            ]);
        }
    }
}
