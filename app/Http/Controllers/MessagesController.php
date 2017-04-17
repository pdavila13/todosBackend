<?php

namespace PaoloDavila\TodosBackend\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use PaoloDavila\TodosBackend\Events\MessageSent;
use PaoloDavila\TodosBackend\Message;

class MessagesController extends TodosBaseController
{
    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [];
        return view('msg',$data);
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        $user->notify(new MessageSentNotification($user, $message));
        return ['status' => 'Message Sent!'];
    }

    /**
     * Fetch all message
     *
     * @return Message
     */
    public function fetchMessage()
    {
        return Message::with('user')->get();
    }
}
