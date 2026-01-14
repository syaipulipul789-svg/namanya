<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
                return redirect()->route('dashboard');
        }
        return redirect()->route('login')->withErrors(['email'=> 'Email atau password salah']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
