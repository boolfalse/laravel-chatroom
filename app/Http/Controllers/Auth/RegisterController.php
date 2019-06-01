<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:100',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $faker = Factory::create('en_US');
        $email = $request->get('email');
        $user = User::where('email', $email)->first();
        $confirm_token = $faker->bothify(str_repeat('*', config('custom.confirm_token_length')));

        if (empty($user))
        {
            $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
                'confirm_token' => $confirm_token,
                'status' => User::NOT_CONFIRMED,
            ]);

            //ss TODO: enable email sending
//            $response = $this->sendEmail($user->email, config('mail.from.address'), $request->get('name'), $confirm_token);
            $response = true;

            if($response) {
                return redirect()->route('login');
            }
            else{
                $user->delete();
                $validator->getMessageBag()->add('email', "Something is wrong with your entered email address! " . $response['message']);

                return Redirect::back()->withErrors($validator);
            }

        }
        else {
            $validator->getMessageBag()->add('email', "We already have registered user with entered email!");

            return Redirect::back()->withErrors($validator);
        }

    }

    public function sendEmail($to_email, $from_email, $name, $confirm_token): bool
    {
        try {
            Mail::send('emails.email-confirm', [
                'confirm_token' => $confirm_token,
            ], function ($message) use ($to_email, $from_email, $name) {
                $message
                    ->to($to_email)
                    ->from($from_email)
                    ->subject("Email Confirmation for " . config('app.name') . "!");
            });

            return true;
        }
        catch(\Exception $e) {
            return false;
        }
    }

}

