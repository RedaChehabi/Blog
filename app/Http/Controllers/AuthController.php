<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->intended('posts')->with('success', 'Login successful');
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }
    public function logout(Request $request)
    {
        auth()->logout();
        // Optionally, invalidate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Logout successful');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        auth()->login($user);

        return redirect('/home')->with('success', 'Registration successful');
    }
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }
}
