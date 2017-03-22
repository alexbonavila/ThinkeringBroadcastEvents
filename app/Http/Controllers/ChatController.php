<?php

namespace Alex\Chat\Http\Controllers;

use Alex\Chat\Events\MessageSent;
use Alex\Chat\Message;
use Auth;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //
    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [];
        return view('chat',$data);
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return array
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);

        //broadcast
        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }

    public function fetchMessages(Request $request)
    {
        return Message::with('user')->get();
    }

}
