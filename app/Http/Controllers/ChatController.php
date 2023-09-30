<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
class ChatController extends Controller
{
    //// app/Http/Controllers/ChatsController.php



    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show chats
     *
     * @return
     */
    public function index($to_id)
    {
        return view('chat.chat',['to_id'=>$to_id]);
    }

    // /**
    //  * Fetch all messages
    //  *
    //  * @return Message
    //  */
    // public function fetchMessages()
    // {
    //     return Message::with('user')->get();
    // }




    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        // $message = Message::create([
        //     'message' => $request->input('message'),
        //     'user_id' => $user->id
        // ]);


        // event(new MessageSent('hello world'));
     //   dd(env('DB_PORT'));

        // MessageSent::dispatch('h1');
     //   broadcast(new MessageSent($user))->toOthers();

        return ['status' => 'Message Sent!'];
    }


}
