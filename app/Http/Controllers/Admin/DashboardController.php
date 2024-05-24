<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Bansos;



class DashboardController extends Controller
{
    public function index (){
        $breadcrumb = (object) [
            'title' => 'Welcome Back at SIMPEL',
            'list' => ['Home','Dashboard']
        ];

        $total = (object) [
            'penduduk' => Penduduk::count(),
            'bansos' => Bansos::count()
        ];


        return view('admin.index', ['breadcrumb' => $breadcrumb, 'total' => $total]);
    }
}
