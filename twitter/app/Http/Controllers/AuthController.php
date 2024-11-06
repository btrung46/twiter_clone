<?php

namespace App\Http\Controllers;

use App\Mail\Welcomemail;
use Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Mail;
class AuthController extends Controller
{
    public function register(){
        return view('Auth.register');
    }
    public function store(){
        $valid = request()->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);
        $user = User::create([
            'name' => $valid['name'],
            'email' => $valid['email'],
            'password' => Hash::make($valid['password'])
        ]);
        Mail::to($user->email)->send(new Welcomemail($user) );
        return redirect()->route('login')->with('success','Acount created successfully!!! please login');
    }

    public function login(){
        return view('Auth.login');
    }
    public function authenticate(){
        $valid = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        if (auth()->attempt($valid)){
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success','logged in successfully!!!');
        }

        return redirect()->route('login')->withErrors(['password'=> 'something does not match']);
    }
    public function logout(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')->with('success','logged out successfully!!!');
    }
}
