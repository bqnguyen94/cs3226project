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

        $limit = 100;
        for ($i = 0; $i < $limit; $i++) {
            $buyer_id = $faker->numberBetween($min = 2, $max = 13);
            $deliverer_id = $buyer_id;
            while ($deliverer_id == $buyer_id) {
                $deliverer_id = $faker->numberBetween($min = 2, $max = 13);
            }
            $chance = $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 1);
            if ($chance >= 0.5) {
                Order::create([
                    'buyer_id' => $buyer_id,
                    'deliverer_id' => $deliverer_id,
                ]);
            } else {
                Order::create([
                    'buyer_id' => $buyer_id,
                ]);
            }

        }
    }
}
