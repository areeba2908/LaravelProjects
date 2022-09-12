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
        $user = new User;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();
       return redirect('/welcome')->with('completed', 'You are Registered');

    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/welcome')->withSuccess('You have Successfully loggedin');
        }
  
        return redirect('loginpage')->withSuccess('Oppes! You have entered invalid credentials');
        //return view ('registrationpage')->with('completed', 'You are Logged in');
    }

    public function logoutUser() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}
