<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Welcome Back at SIMPEL',
            'list'  => ['Beranda','Penduduk']
        ];
        
        return view('user.index', ['breadcrumb' => $breadcrumb]);
    }

    public function datakk() 
    {
        $breadcrumb = (object) [
            'title' => 'Welcome Back at SIMPEL',
            'list'  => ['Data Keluarga']
        ];
        
        return view('user.dataKeluarga.datakk', ['breadcrumb' => $breadcrumb]);
    }

    public function detail()
    {
        $breadcrumb = (object) [
            'title' => 'Detail Data Penduduk',
            'list'  => ['Beranda', 'Penduduk', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Data Penduduk'
        ];

        $activeMenu = 'penduduk';

        return view('user.dataKeluarga.detail', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }
    public function pengaduan()
{
    $breadcrumb = (object) [
        'title' => 'Pengaduan Warga',
        'list'  => ['Home', 'Pengaduan Warga']
    ];

    //$complaints = \App\Models\Pengaduan::all();

    return view('user.pengaduan.index', [
        'breadcrumb' => $breadcrumb,
        //'complaints' => $complaints
    ]);
}
}