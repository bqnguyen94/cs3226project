<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Thread;
use App\Message;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the message dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->to('/');
        }
        $user = Auth::user();
        return view('threads')->with('threads', $user->get_all_threads());
    }


    public function chatWith($id) {
        $user = Auth::user();
        $otherUser = User::where('id', $id)->first();
        if ($otherUser && $user != $otherUser) {
            return $this->get_or_create_thread($user->id, $otherUser->id);
        }
        return redirect()->to('/');
    }

    public function get_or_create_thread($first_id, $second_id) {
        $thread = Thread::get_thread($first_id, $second_id);
        return redirect()->to('/messages/' . $thread->id);
    }

    public function messages($id) {
        if (!Auth::check()) {
            return redirect()->to('/');
        }
        $user = Auth::user();
        $thread = Thread::where('id', $id)->first();
        if (!$thread || ($thread->first_user_id != $user->id && $thread->second_user_id != $user->id)) {
            return redirect()->to('/');
        }
        $receiver_id = $thread->first_user_id;
        if ($receiver_id == $user->id) {
            $receiver_id = $thread->second_user_id;
        }
        $messages = $thread->get_all_messages();
        if ($user->id == $thread->first_user_id) {
            $temp = $messages
                ->where('sender_id', '!=', $user->id)
                ->last();
            if ($temp) {
                $thread->first_user_last_read = $temp->id;
            }

        } else {
            $temp = $messages
                ->where('sender_id', '!=', $user->id)
                ->last();
            if ($temp) {
                $thread->second_user_last_read = $temp->id;
            }
        }
        $thread->save();
        $receiver = User::where('id', $receiver_id)->first();
        return view('messages')
            ->with('thread', $thread)
            ->with('receiver', $receiver)
            ->with('messages', $messages);
    }

    public function reply(Request $request) {
        //if (Auth::check()) {
            $user = Auth::user();
            $thread_id = $request->thread_id;
            $message = $request->message;

            $thread = Thread::where('id', $thread_id)->first();
/*
            if (!$thread || ($thread->first_user_id != $user->id && $thread->second_user_id != $user->id)) {
                return redirect()->to('/');
            }
*/
            $message = Message::create([
                'thread_id' => $thread_id,
                'sender_id' => $user->id,
                'message' => $message,
            ]);
            /*
            $data = [
                "sender_name" => $user->name,
                "sender_id" => $user->id,
                "message" => $message->message,
                "created_at" => $message->created_at,
            ];
            return response()->json($data);
            */
        //}
    }

    public function refresh_messages($id) {
        if (Auth::check()) {
            $thread = Thread::where('id', $id)->first();
            $user = Auth::user();
            if ($user->id == $thread->first_user_id || $user->id == $thread->second_user_id) {
                $messages = $thread->get_all_messages();
                if ($user->id == $thread->first_user_id) {
                    $temp = $messages
                        ->where('sender_id', '!=', $user->id)
                        ->last();
                    if ($temp) {
                        $thread->first_user_last_read = $temp->id;
                    }

                } else {
                    $temp = $messages
                        ->where('sender_id', '!=', $user->id)
                        ->last();
                    if ($temp) {
                        $thread->second_user_last_read = $temp->id;
                    }
                }
                $data = array();
                $line = new \stdClass();
                foreach ($messages as $message) {
                    $sender = User::where('id', $message->sender_id)->first();
                    $line->sender_name = $sender->name;
                    $line->sender_id = $sender->id;
                    $line->message = $message->message;
                    $line->created_at = $message->created_at;
                    $line->message_id = $message->id;
                    $data[] = json_encode($line);
                }
                $jsonData = '{"results":[';
                $jsonData .= implode(",", $data);
                $jsonData .= ']}';
                return $jsonData;
            }
        }
    }
}
