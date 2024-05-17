<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PopulationController extends Controller
{
    public function index (){
        $breadcrumb = (object) [
            'title' => 'Welcome Back at SIMPEL',
            'list' => ['Data Penduduk']
        ];

        return view('admin.population.index', ['breadcrumb' => $breadcrumb]);
    }
}
