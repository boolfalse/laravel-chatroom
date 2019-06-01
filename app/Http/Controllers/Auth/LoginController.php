<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('guest')->except(['logout']);
    }

    public function login(Request $request)
    {
//        $this->validateLogin($request);
        $validator = Validator::make($request->all(), [
            'email' => 'email|required',
            'password' => 'required|min:6|max:100',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $user = User::where('email', $request->get('email'))->first();
        if(empty($user)){
            return $this->sendFailedLoginResponse($request);
        }
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function showLoginForm()
    {
        if(Auth::check()) {
            return redirect()->route('user.home');
        } else {
            return view('auth.login');
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('home');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:6|max:100',
        ]);
    }
}

