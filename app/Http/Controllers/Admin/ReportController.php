<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index (){
        $breadcrumb = (object) [
            'title' => 'Welcome Back at SIMPEL',
            'list' => ['Laporan Masyarakat']
        ];

        return view('admin.report.index', ['breadcrumb' => $breadcrumb]);
    }
}
