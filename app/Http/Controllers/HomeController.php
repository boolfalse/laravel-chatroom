<?php

namespace App\Http\Controllers;

use App\Models\DialogChannel;
use App\Models\User;
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
        ]);
    }
}
