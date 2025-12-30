<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|max:50'
        ]);

        $emailAdmin = 'admin@dompetku.com';
        $passwordAdmin = 'admin';

        if ($request->email === $emailAdmin && $request->password === $passwordAdmin) {
            session(['is_logged_in' => true]);
            session()->regenerate();

            return redirect('/');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        Auth::logout(Auth::user());
        session()->flush();
        return redirect('/login');
    }
}
