<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Thread;
use App\Message;

class ThreadsAndMessagesSeeder extends Seeder
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
        $limit = 12;

        for ($i = 1; $i <= $limit; $i+=2) {
            $thread = Thread::create([
                'first_user_id' => $i,
                'second_user_id' => $i + 1,
            ]);
            Message::create([
                'thread_id' => $thread->id,
                'sender_id' => $i,
                'message' => $faker->text,
            ]);
            Message::create([
                'thread_id' => $thread->id,
                'sender_id' => $i + 1,
                'message' => $faker->text,
            ]);
        }
    }
}
