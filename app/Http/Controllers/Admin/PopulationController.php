<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Penduduk;

class PopulationController extends Controller
{
    public function index (){
        $breadcrumb = (object) [
            // 'title' => 'Welcome Back at SIMPEL',
            'list' => ['Data Penduduk']
        ];

        $dataPopulation = Penduduk::all();

        return view('admin.population.index', ['breadcrumb' => $breadcrumb, 'dataPopulation' => $dataPopulation]);
    }

    public function list(Request $request)
    {
        $dataPopulation = Penduduk::with('user', 'status')->select(
            'id_penduduk',
            'NIK',
            'nama',
            'NoKK',
            'TTL',
            'Agama',
            'Jenis Kelamin',
            'rt',
            'Alamat',
            'id_status',
            'id_user'
        );

        return DataTables::of($dataPopulation)
            ->addIndexColumn()
            // ->editColumn('aksi', function ($data) {
            //     return '<a href="' . route('penduduk.edit', $data->NIK) . '">Edit</a> <a href="' . route('penduduk.destroy', $data->id_penduduk) . '" onclick="return confirm(\'Apakah anda yakin?\')">Hapus</a>';
            // })
            ->addColumn('status_nikah', function ($data) {
                return $data->status->status_nikah;
            })
            // ->rawColumns(['rt'])
            ->make(true);
    }
}
