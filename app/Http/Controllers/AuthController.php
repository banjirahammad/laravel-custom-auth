<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }


    public function loginAction(Request $request)
    {
        $validated = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if (!Auth::attempt($request->only('email','password'), $request->boolean('rememberme')))
        {
            throw ValidationException::withMessages([
                'email'=>'Invalid email or password'
            ]);
        }
        return redirect()->route('home');

    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerAction(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }

}
