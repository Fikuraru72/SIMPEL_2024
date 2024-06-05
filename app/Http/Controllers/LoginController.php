<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index (Request $request){
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $isAuthenticated = Auth::attempt($credentials);

        if ($isAuthenticated) {


            if (Auth::user()->level == 'admin') {
                return redirect("admin/");
            } else {
                return redirect("penduduk/");
            }
        }

        return back()->withErrors([
        'username' => 'The provided credentials do not match our records.',
    ]);

    }

public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
