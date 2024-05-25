<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Pengaduan Penduduk',
            'list'  => ['Beranda', 'Pengaduan Penduduk']
        ];

        //$complaints = \App\Models\Pengaduan::all();

        return view('user.pengaduan.index', [
            'breadcrumb' => $breadcrumb,
        ]);
    }
}
