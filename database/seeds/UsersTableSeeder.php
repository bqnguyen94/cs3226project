<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
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
        $limit = 10;

        User::create([
            'name' => 'Admin',
            'email' => 'admin@unicorn.com',
            'password' => bcrypt('123456'),
            'role' => User::ROLE_ADMIN,
        ]);

        User::create([
            'name' => 'Test Buyer',
            'email' => 'buyer@unicorn.com',
            'password' => bcrypt('123456'),
            'role' => User::ROLE_USER,
        ]);

        User::create([
            'name' => 'Test Deliverer',
            'email' => 'deliverer@unicorn.com',
            'password' => bcrypt('123456'),
            'role' => User::ROLE_USER,
        ]);

        for ($i = 0; $i < $limit; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret'),
                'remember_token' => str_random(10),
                'role' => User::ROLE_USER,
            ]);
        }
    }
}
