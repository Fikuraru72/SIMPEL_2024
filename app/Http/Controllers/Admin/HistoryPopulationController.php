<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->level == 'admin') {
            $dataHistory = Penduduk::with('user', 'status')
                ->whereHas('status', function ($query) {
                    $query->whereIn('status_warga', ['Meninggal', 'Pindah']);
                })
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
                );
        } else {
            $rt = Auth::user()->level;

            $dataHistory = Penduduk::with('user', 'status')
                ->whereHas('status', function ($query) {
                    $query->whereIn('status_warga', ['Meninggal', 'Pindah']);
                })
                ->where('rt', Auth::user()->level)
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
                );
        }

        return DataTables::of($dataHistory)
            ->addIndexColumn()
            ->editColumn('aksi', function ($data) {
                $btn = '<button type="button" class="btn btn-rounded btn-info confirmation py-2 detail" data-toggle="modal"
                        data-target="#modal-detail" data-id="'.$data->id_penduduk.'"> Detail </button>';
                return $btn;
            })
            ->addColumn('status_warga', function ($data) {
                return $data->status ? $data->status->status_warga : ' - ';
            })
            // ->rawColumns(['rt'])
            ->rawColumns(['aksi'])

            ->make(true);
    }
}
