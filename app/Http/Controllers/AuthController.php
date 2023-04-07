<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        } 
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        if (Auth::check()) {
            return redirect('home');
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('home');
        } else {
            return redirect('login')->with('error_message', 'Invalid Email or Password');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect('login');
    }

    public function registration()
    {
        if (Auth::check()) {
            return redirect('home');
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        if (Auth::check()) {
            return redirect('home');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect('login');
    }
}
