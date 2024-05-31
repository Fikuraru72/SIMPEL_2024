<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bansos;
use Illuminate\Http\Request;

class PerhitunganMooraController extends Controller
{
    public function index (){
        $breadcrumb = (object) [
            'title' => 'Welcome Back at SIMPEL',
            'list' => ['Home','Dashboard']
        ];

        $bansos = Bansos::all();

        return view('admin.moora.index', ['breadcrumb' => $breadcrumb], compact('bansos'));
    }
}
