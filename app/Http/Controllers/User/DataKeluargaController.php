<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penduduk;

class DataKeluargaController extends Controller
{
    public function index($id)
    {
        $breadcrumb = (object) [
            'title' => 'Data Keluarga',
            'list'  => ['Beranda', 'Data Keluarga']
        ];

        if ($id) {
            $dataUser = Penduduk::where('id_penduduk', $id)->first();
        } elseif ($request->has('id_penduduk')) {
            // $id_penduduk = $request->input('id_penduduk');
            // $dataKeluarga = Penduduk::where('id_penduduk', $id_penduduk)->get();
        }
        $dataKeluarga = Penduduk::where('NoKK', $dataUser->NoKK)->get();

        // dd($dataUser->Nokk);
        return view('user.dataKeluarga.index', compact('breadcrumb', 'dataKeluarga'));
    }

    // public function search(Request $request)
    // {
    //     $id_penduduk = $request->input('id_penduduk');

    //     $dataKeluarga = Penduduk::where('id_penduduk', $id_penduduk)->get();

    //     $breadcrumb = (object) [
    //         'title' => 'Data Keluarga',
    //         'list'  => ['Beranda', 'Data Keluarga']
    //     ];

    //     return view('user.dataKeluarga.index', compact('breadcrumb', 'dataKeluarga'));
    // }
}
