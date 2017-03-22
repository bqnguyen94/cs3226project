<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Message;

class Thread extends Model
{
    //
    public function get_all_messages() {
        $messages = Message::where('thread_id', $this->id)->get();
        return $messages;
    }

    public function get_last_message() {
        return $this->get_all_messages()->sortByDesc('created_at')->first();

    }

    public static function get_thread($first_id, $second_id) {
        $thread = Thread::where('first_user_id', $first_id)
                        ->andWhere('second_user_id', $second_id)
                        ->first();
        if (!$thread) {
            $thread = Thread::where('first_user_id', $second_id)
                            ->andWhere('second_user_id', $first_id)
                            ->first();
            if (!$thread) {
                $thread = Thread::create([
                    'first_user_id' => $first_id,
                    'second_user_id' => $second_id,
                ]);
            }
        }
        return $thread;
    }
}
