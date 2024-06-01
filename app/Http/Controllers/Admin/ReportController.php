<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Pengaduan;


class ReportController extends Controller
{
    public function index (){
        $breadcrumb = (object) [
            'title' => 'Welcome Back at SIMPEL',
            'list' => ['Laporan Masyarakat']
        ];

        $dataReport = Pengaduan::all();

        return view('admin.report.index', ['breadcrumb' => $breadcrumb, 'dataReport' => $dataReport]);
    }

    public function list(Request $request){
    $dataReport = Pengaduan::select(
        'id_pengaduan',
        'subjek',
        'pesan',
        'created_at'
    );

    return DataTables::of($dataReport)
        ->addIndexColumn()
        ->editColumn('created_at', function ($data) {
            return date('d/m/Y', strtotime($data->created_at));
        })
        ->make(true);
    }

}
