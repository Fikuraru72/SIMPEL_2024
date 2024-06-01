<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Bansos;
use App\Models\User;

class AssistanceDataController extends Controller
{
    public function index (){
        $breadcrumb = (object) [
            'title' => 'Welcome Back at SIMPEL',
            'list' => ['Home','Dashboard']
        ];

        // $dataAssitance = Bansos::all();

        return view('admin.assistanceData.index', ['breadcrumb' => $breadcrumb]);
    }

    public function list(Request $request)
    {
        $dataAssitance = Bansos::with('penduduk')
        ->where('status', 'terkonfirmasi')
        ->select(
            'id_alternatif',
            'id_penduduk',
            'pendapatan',
            'tanggungan',
            'pbb',
            'tagihanAir',
            'tagihanListrik',
            'status',
        );

        return DataTables::of($dataAssitance)
            ->addIndexColumn()
            ->addColumn('NoKK', function ($data) {
                return $data->penduduk->NoKK;
            })
            ->addColumn('nama', function ($data) {
                return $data->penduduk->nama;
            })
            ->make(true);
    }
}
