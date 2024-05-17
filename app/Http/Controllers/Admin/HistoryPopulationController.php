<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryPopulationController extends Controller
{
    public function index (){
        $breadcrumb = (object) [
            'title' => 'Welcome Back at SIMPEL',
            'list' => ['Riwayat','Data Penduduk']
        ];

        return view('admin.historyPopulation.index', ['breadcrumb' => $breadcrumb]);
    }
}
