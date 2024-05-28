<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataKeluarga;

class DataKeluargaController extends Controller
{
    public function index() 
    {
        $breadcrumb = (object) [
            'title' => 'Data Keluarga',
            'list'  => ['Beranda', 'Data Keluarga']
        ];

        $dataKeluarga = DataKeluarga::all();
        
        return view('user.dataKeluarga.index', compact('breadcrumb', 'dataKeluarga'));
    }

    public function search(Request $request)
{
    $id_penduduk = $request->input('id_penduduk');
    
    $dataKeluarga = DataKeluarga::where('id_penduduk', $id_penduduk)->get();

    $breadcrumb = (object) [
        'title' => 'Data Keluarga',
        'list'  => ['Beranda', 'Data Keluarga']
    ];

    return view('user.dataKeluarga.index', compact('breadcrumb', 'dataKeluarga'));
}
}
