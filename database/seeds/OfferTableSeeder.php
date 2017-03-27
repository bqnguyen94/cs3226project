<?php

use Illuminate\Database\Seeder;
use App\Food;
use App\Order;
use App\Offer;
use App\User;
use Faker\Factory;

class OfferTableSeeder extends Seeder
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

        foreach (Order::all() as $order) {
            if (!$order->deliverer_id) {
                $num_offers = $faker->numberBetween($min = 0, $max = 5);
                for ($i = 0; $i < $num_offers; $i++) {
                    $offerer = User::all()->random();
                    $price = $order->get_total_food_price() + $faker->numberBetween($min = 0, $max = 5) * 0.1;
                    $price = number_format($price, 2);
                    Offer::create([
                        'price' => $price,
                        'order_id' => $order->id,
                        'offerer_id' => $offerer->id,
                    ]);
                }
            }
        }
    }
}
