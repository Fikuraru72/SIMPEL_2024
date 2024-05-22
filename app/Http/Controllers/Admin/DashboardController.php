<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penduduk;



class DashboardController extends Controller
{
    public function index (){
        $breadcrumb = (object) [
            'title' => 'Welcome Back at SIMPEL',
            'list' => ['Home','Dashboard']
        ];

        $penduduk = Penduduk::all();

        return view('admin.index', ['breadcrumb' => $breadcrumb, 'penduduk' => $penduduk]);
    }
}
