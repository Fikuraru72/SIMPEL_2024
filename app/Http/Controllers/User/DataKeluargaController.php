<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataKeluargaController extends Controller
{
    public function index() 
    {
        $breadcrumb = (object) [
            'title' => 'Data Keluarga',
            'list'  => ['Beranda', 'Data Keluarga']
        ];
        
        return view('user.dataKeluarga.index', ['breadcrumb' => $breadcrumb]);
    }

    public function detail()
    {
        $breadcrumb = (object) [
            'title' => 'Detail Data Penduduk',
            'list'  => ['Beranda', 'Data Keluarga', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Data Penduduk'
        ];

        $activeMenu = 'penduduk';

        return view('user.dataKeluarga.detail', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }
}
