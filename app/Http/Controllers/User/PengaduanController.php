<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Pengaduan Penduduk',
            'list' => ['Beranda', 'Pengaduan Penduduk']
        ];


        return view('user.pengaduan.index', [
            'breadcrumb' => $breadcrumb,
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'subjek' => 'required|string|max:30',
        'pesan' => 'required|string',
        'rt' => 'required|string|max:3',
    ]);

    Pengaduan::create([
        'subjek' => $request->subjek,
        'pesan' => $request->pesan,
        'rt' => $request->rt,
    ]);

    return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil diajukan.');
}

}
