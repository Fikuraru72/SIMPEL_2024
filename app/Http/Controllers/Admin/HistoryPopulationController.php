<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Penduduk;
// use App\Models\Status;

class HistoryPopulationController extends Controller
{
    public function index (){
        $breadcrumb = (object) [
            'title' => 'Welcome Back at SIMPEL',
            'list' => ['Riwayat','Data Penduduk']
        ];

        $dataHistory = Penduduk::all();

        return view('admin.historyPopulation.index', ['breadcrumb' => $breadcrumb, 'dataHistory' => $dataHistory]);
    }

    public function list(Request $request)
    {
        $dataHistory = Penduduk::whereNotNull('updated_at')
        ->select(
            'id_penduduk',
            'NIK',
            'nama',
            'NoKK',
            'TTL',
            'Agama',
            'JenisKelamin',
            'rt',
            'Alamat',
            'updated_at'
        );

        return DataTables::of($dataHistory)
            ->addIndexColumn()
            // ->editColumn('aksi', function ($data) {
            //     return '<a href="' . route('penduduk.edit', $data->NIK) . '">Edit</a> <a href="' . route('penduduk.destroy', $data->id_penduduk) . '" onclick="return confirm(\'Apakah anda yakin?\')">Hapus</a>';
            // })
            // ->addColumn('status_nikah', function ($data) {
            //     return $data->status ? $data->status->status_nikah : ' - ';
            // })
            // ->rawColumns(['rt'])
            ->make(true);
    }
}
