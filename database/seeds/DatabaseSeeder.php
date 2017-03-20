<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RestaurantsTableSeeder::class);
        $this->call(FoodsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderToFoodsTableSeeder::class);
        $this->call(UserToFoodsTableSeeder::class);
    }
}
