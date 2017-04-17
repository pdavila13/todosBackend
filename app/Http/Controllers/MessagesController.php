<?php

namespace PaoloDavila\TodosBackend\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class MessagesController extends TodosBaseController
{
    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [];
        return view('messages',$data);
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

        $user->messages()->create([
            'message' => $request->input('message')
        ]);

        return ['status' => 'Message Sent!'];
    }
}
