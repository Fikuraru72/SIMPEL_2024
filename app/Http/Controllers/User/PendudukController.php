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
            'list'  => ['Home','Penduduk']
        ];
        
        return view('user.index', ['breadcrumb' => $breadcrumb]);
    }

    public function datakk() 
    {
        $breadcrumb = (object) [
            'title' => 'Welcome Back at SIMPEL',
            'list'  => ['Data Keluarga']
        ];
        
        return view('user.datakk', ['breadcrumb' => $breadcrumb]);
    }

    public function detail()
    {
        $breadcrumb = (object) [
            'title' => 'Detail Data Penduduk',
            'list'  => ['Home', 'Penduduk', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Data Penduduk'
        ];

        $activeMenu = 'penduduk';

        return view('user.detail', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }
}