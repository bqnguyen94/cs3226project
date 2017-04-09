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
        /*
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
        */
        Restaurant::create([
            'name' => 'Hwang\'s Korean Restaurant',
            'location' => $locations[3],
        ]);

        Restaurant::insert([
            'name' => "Hwang's Korean Restaurant",
            'location' => "The Terrace NUS Business Canteen"
        ]);

        Restaurant::insert([
            'name' => "Ayam Penyet",
            'location' => "Frontier, Faculty of Science"
        ]);

        Restaurant::insert([
            'name' => "West Twin Bar, Western Food",
            'location' => "Frontier, Faculty of Science"
        ]);

    }
}
