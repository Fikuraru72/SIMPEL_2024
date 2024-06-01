<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Bansos;
use Carbon\Carbon;



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

    public function getBansosData(Request $request)
    {
        $bansosData = Bansos::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get()
            ->pluck('count', 'month');

        return response()->json($bansosData);
    }

    public function getPendudukData(Request $request)
    {
        $rt = $request->input('rt');
        $pendudukData = Penduduk::selectRaw('rt, COUNT(*) as count')
            ->groupBy('rt')
            ->when($rt, function($query, $rt) {
                return $query->where('rt', $rt);
            })
            ->get()
            ->pluck('count', 'rt');

        return response()->json($pendudukData);
    }
}
