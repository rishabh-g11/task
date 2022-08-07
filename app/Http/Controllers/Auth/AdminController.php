<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Hash;
use App\Models\UserVerify;


class AdminController extends Controller
{
    public function adminRegister()
    {
        return view('auth.admin.registration');
    }
    /**for admin login **/
    public function adminLogin()
    {
        return view('auth.admin.login');
    }
    /**admin login **/
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ]);
        try {
            $user = User::where('email', $request->email)->first();

            if($user->role!="admin"){
                return redirect()->back()->with('error', 'You are not allow login from here.');
            }
            if ($user) {
                if (!\Hash::check($request->password, $user->password)) {
                    return redirect()->back()->with('error', 'Incorrect password');
                } else {
                    $data['remember_token'] = \Str::random(60);
                    $user->update($data);
                    \Auth::login($user);
                }
            } else {
                return redirect()->back()->with('error','entered invalid credentials');
            }

            // CHECK IF USER IS ACTIVE OR NOT
        } catch (\Exception $e) {
            return redirect()->back()
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
        $data['role'] = 'admin';
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
}
