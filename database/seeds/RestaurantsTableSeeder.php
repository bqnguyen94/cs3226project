<?php

use Illuminate\Database\Seeder;
use App\Restaurant;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            'Universiy Town',
            'The Deck',
            'Yusof Ishak House',
            'Biz Canteen',
            'Science Canteen',
        ];
        $faker = Faker\Factory::create();

        $limit = 10;
        for ($i = 1; $i <= $limit; $i++) {
            $name = 'Restaurant ' . $i;
            $location = $locations[$faker->numberBetween($min = 0, $max = count($locations) - 1)];

            Restaurant::create([
                'name' => $name,
                'location' => $location
            ]);
        }

    }
}
