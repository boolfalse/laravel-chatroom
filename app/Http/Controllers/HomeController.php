<?php

namespace App\Http\Controllers;

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
        $users = User::where('id', '!=', Auth::user()->id)->get();
        $speaker = $users->first();

        View::share('users', $users);

        return view('chatroom.chat-dialog', [
            'speaker' => $speaker,
        ]);
    }
}
