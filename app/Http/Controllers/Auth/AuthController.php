<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use App\Models\UserVerify;


class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ]);
        try {
            $user = User::where('email', $request->email)->first();

            if ($user) {
                if (!\Hash::check($request->password, $user->password)) {
                    return redirect()->route('index')->with('error', 'Incorrect password');
                } else {
                    $data['remember_token'] = \Str::random(60);
                    $user->update($data);
                    \Auth::login($user);
                }
            } else {
                return redirect()->route('index')->with('error','entered invalid credentials');
            }

            // CHECK IF USER IS ACTIVE OR NOT
        } catch (\Exception $e) {
            // dd($e->getMesssage());
            return redirect()->route('index')
                ->with('error', 'something is wrong');
        }

        return redirect("dashboard")->with('success', 'You are logged in successfully');
    }

    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $data['role'] = 'user';
        $data['password'] = \Hash::make($data['password']);
        $createUser = User::create($data);

        $token = \Str::random(64);

        UserVerify::create([
            'user_id' => $createUser->id,
            'token' => $token
        ]);

        \Mail::send('email.emailVerificationEmail', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->from('rishabh36912@gmail.com');
            $message->subject('Email Verification Mail');
        });

        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }



    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
            // return redirect()->route('company.index');
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }

    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;

            if (!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

        return redirect()->route('index')->with('message', $message);
    }
}
