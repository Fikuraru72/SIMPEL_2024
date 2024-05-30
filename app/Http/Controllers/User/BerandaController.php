<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penduduk;

class BerandaController extends Controller
{
    public function index($id)
    {
        // Ambil data penduduk berdasarkan ID yang diberikan
        $user = Penduduk::find($id);
        
        // Definisikan breadcrumb sesuai kebutuhan Anda
        $breadcrumb = (object) [
            'title' => 'Beranda',
            'list'  => ['Home','Penduduk']
        ];
        
        // Kirim data penduduk dan breadcrumb ke tampilan
        return view('user.index', compact('breadcrumb', 'user'));
    }
}