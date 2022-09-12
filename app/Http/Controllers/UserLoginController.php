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
            $user = DB::table('users')->where('email', $request['email'])->value('name');
            //echo "$user";
            return view('/welcome',compact('user'))->withSuccess('You have Successfully loggedin');
        }
  
        return redirect('/')->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function logoutUser() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}
