<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request)
    {
        // if ($request->npsn === '20103786' && $request->password === "password") {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/dashboard');
        // } else {
        //     return 'npsn atau password salah!';
        // }
        $credentials = $request->validate([
            'username' => ['required', 'max:100'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginFail', 'Masuk gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('successLogout', 'Anda telah keluar');
    }
}