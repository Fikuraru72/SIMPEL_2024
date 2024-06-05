<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penduduk;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        // Ambil data penduduk berdasarkan ID yang diberikan
        $user = Auth::user();
        $user = Penduduk::find($user->id_penduduk);

        // Definisikan breadcrumb sesuai kebutuhan Anda
        $breadcrumb = (object) [
            'title' => 'Beranda',
            'list'  => ['Home','Penduduk']
        ];

        // Kirim data penduduk dan breadcrumb ke tampilan
        return view('user.index', compact('breadcrumb', 'user'));
    }
}
