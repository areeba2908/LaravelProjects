<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;


class UserLoginController extends Controller
{
    public function loginpage()
    {
        return view ('loginpage');
    }

    public function registrationpage()
    {
        return view ('registrationpage');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        $user= User::createUser($request);
        auth()->login($user);
        $user = User::where('email', $request['email'])->first();
        return view('/welcome',compact('user'))->withMessage('You have Successfully loggedin');;
    }

    public function loginUser(Request $request)
    {
        User::validateUser($request);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            //Auth::login($user);
            $user = User::where('email', $request['email'])->first();
            session()->flash('success', 'Post successfully updated.');
            return view('/welcome',compact('user'));
        }
        return redirect('/')->with('Oppes! You have entered invalid credentials');
    }

    public function logoutUser() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}
