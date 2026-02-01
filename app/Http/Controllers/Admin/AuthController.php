<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Logika autentikasi manual
        $credentials = $request->only('username', 'password');

        if ($credentials['username'] === 'admin' && $credentials['password'] === 'rahasia') {
            session(['admin' => true]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['error' => 'Username atau password salah']);
    }
}