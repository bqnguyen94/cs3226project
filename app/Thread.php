<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Message;

class Thread extends Model
{

    protected $fillable = ['first_user_id', 'second_user_id'];
    //
    public function get_all_messages() {
        $messages = Message::where('thread_id', $this->id)->get();
        return $messages;
    }

    public function get_last_message() {
        return $this->get_all_messages()->sortByDesc('created_at')->first();

    }

    public function get_num_unread($id) {
        if ($id == $this->first_user_id) {
            return Message::where('thread_id', $this->id)
                    ->where('sender_id', '!=', $this->first_user_id)
                    ->where('id', '>', $this->first_user_last_read)
                    ->count();
        }
        if ($id == $this->second_user_id) {
            return Message::where('thread_id', $this->id)
                    ->where('sender_id', '!=', $this->second_user_id)
                    ->where('id', '>', $this->second_user_last_read)
                    ->count();
        }
        return 0;
    }

    public static function get_thread($first_id, $second_id) {
        $thread = Thread::where('first_user_id', $first_id)
                        ->where('second_user_id', $second_id)
                        ->first();
        if (!$thread) {
            $thread = Thread::where('first_user_id', $second_id)
                            ->where('second_user_id', $first_id)
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

    public static function get_total_unread($id) {
        $user = User::where('id', $id)->first();
        $cnt = 0;
        if ($user) {
            $threads = $user->get_all_threads();
            foreach ($threads as $thread) {
                $cnt += $thread->get_num_unread($user->id);
            }
        }
        return $cnt;
    }
}
