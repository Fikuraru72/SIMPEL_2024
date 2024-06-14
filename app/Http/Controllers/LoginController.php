<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Penduduk;
use App\Models\User;


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
            } elseif (Auth::user()->level == 'penduduk') {
                return redirect("penduduk/");
            } else {
                return redirect("admin/");
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

    public function showPassword(){
        return view('forgetPswd');
    }

    public function searchPassword(Request $request)
    {

       $request->validate([
            'nokk' => 'required|string',
            'nik' => 'required|string',
        ]);

        $nokk = $request->input('nokk');
        $nik = $request->input('nik');

        // Mencari penduduk berdasarkan nokk dan nik
        $penduduk = Penduduk::where('nokk', $nokk)->where('nik', $nik)->first();

        if ($penduduk) {
            // Mencari user berdasarkan id_penduduk
            $user = User::where('id_penduduk', $penduduk->id)->first();

            if ($user) {
                return response()->json(['password' => $penduduk->password]);
            } else {
                return back()->withErrors(['message' => 'User not found.']);
            }
        } else {
            return back()->withErrors(['message' => 'Penduduk not found.']);
        }
    }
}
