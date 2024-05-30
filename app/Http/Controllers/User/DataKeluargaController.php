<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penduduk;

class DataKeluargaController extends Controller
{
    public function index(Request $request, $id = null, $noKK = null)
    {
        $breadcrumb = (object) [
            'title' => 'Data Keluarga',
            'list'  => ['Beranda', 'Data Keluarga']
        ];

        if ($id || $noKK) {
            $dataKeluarga = Penduduk::where('id_penduduk', $id)
                                        ->orWhere('NoKK', $noKK)
                                        ->get();
        } elseif ($request->has('id_penduduk')) {
            $id_penduduk = $request->input('id_penduduk');
            $dataKeluarga = Penduduk::where('id_penduduk', $id_penduduk)->get();
        }

        return view('user.dataKeluarga.index', compact('breadcrumb', 'dataKeluarga'));
    }

    public function search(Request $request)
    {
        $id_penduduk = $request->input('id_penduduk');

        $dataKeluarga = Penduduk::where('id_penduduk', $id_penduduk)->get();

        $breadcrumb = (object) [
            'title' => 'Data Keluarga',
            'list'  => ['Beranda', 'Data Keluarga']
        ];

        return view('user.dataKeluarga.index', compact('breadcrumb', 'dataKeluarga'));
    }
}
