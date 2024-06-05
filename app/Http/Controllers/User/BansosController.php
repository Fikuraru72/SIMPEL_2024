<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bansos;
use Illuminate\Support\Facades\Auth;


class BansosController extends Controller
{
    public function index()
{
    $breadcrumb = (object) [
        'title' => 'Pengajuan Bantuan Sosial',
        'list'  => ['Beranda', 'Pengajuan Bantuan Sosial']
    ];

    $user = Auth::user();
    $bansos = Bansos::with('penduduk')
    ->where('id_penduduk', $user->id_penduduk)
    ->get();

    return view('user.bansos.index', compact('breadcrumb', 'bansos'));
}

    public function detail()
    {
        $breadcrumb = (object) [
            'title' => 'Detail Pengajuan Bantuan Sosial',
            'list'  => ['Beranda', 'Pengajuan Bantuan Sosial', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Pengajuan Bantuan Sosial'
        ];

        $activeMenu = 'bansos';

        return view('user.bansos.detail', compact('breadcrumb', 'page', 'activeMenu'));
    }
}
