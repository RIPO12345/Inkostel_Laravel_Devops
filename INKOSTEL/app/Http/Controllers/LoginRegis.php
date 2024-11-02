<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class LoginRegis extends Controller
{
    public function login(){
        return view("login");
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('carikost');
        }

        return redirect()->route('login')->with('error', 'Invalid username or password.');
    }

    public function registrationPost(Request $request)
    {
        $request->validate([
            'usernameReg' => 'required',
            'email' => 'required|email|unique:users,email',
            'passwordReg' => 'required|min:6'
        ]);

        $user = new User();
        $user->username = $request->usernameReg;
        $user->email = $request->email;
        $user->password = Hash::make($request->passwordReg);
        $user->save();

        if(!$user){
            return redirect(route('login'))->with("error", "Regis tidak valid, coba lagi");
        }

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
  
    public function logout(){
        Session::flush() ;
        Auth::logout();
        return redirect(route('login'));
    }
}
