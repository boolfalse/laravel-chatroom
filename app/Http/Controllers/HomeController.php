<?php

namespace App\Http\Controllers;

use App\Events\NewConversation;
use App\Models\Conversation;
use App\Models\DialogChannel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([
            'welcome',
        ]);
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function index()
    {
        return view('home');
    }

    public function chatroom()
    {
        $user = Auth::user();
        $users = User::where('id', '!=', $user->id)->get();
        $speaker = $users->first();

        $dialog_channel = DialogChannel::first();
        $conversations = $dialog_channel->conversations()->take(3)->get();

        View::share('users', $users);

        return view('chatroom.chat-dialog', [
            'speaker' => $speaker,
            'conversations' => $conversations,
            'user' => $user,
            'dialog_channel' => $dialog_channel,
        ]);
    }

    public function send_conversation(Request $request)
    {
        $dialog_channel = DialogChannel::where('channel_token', '=', $request->get('channel_token'))->first();

        $conversation = new Conversation();
        $conversation->user_id = Auth::user()->id;
        $conversation->text = $request->get('text');
        $conversation->dialog_channel_id = $dialog_channel->id;
        $conversation->created_at = Carbon::now();
        $conversation->save();

        broadcast(new NewConversation($conversation))->toOthers();

        return response()->json($conversation, 200);
    }
}
