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
            'list' => ['Home','Penduduk']
        ];
        
        return view('user.index', ['breadcrumb' => $breadcrumb]);
    }
}