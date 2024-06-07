<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Bansos;
use App\Models\User;
use App\Models\Penduduk;


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

    public function store(Request $request)
    {
        // dd($request);

        $validatedData = $request->validate([
            'nik' => 'required|string|',
            'nokk' => 'required|string',
            'pendapatan' => 'required|integer',
            'tanggungan' => 'required|integer',
            'pbb' => 'required|integer',
            'tagAir' => 'required|integer',
            'tagListrik' => 'required|integer',
        ]);

        // $user = Auth::user();
        $penduduk = Penduduk::where('NIK', $request->nik)
                            ->where('NoKK', $request->nokk)
                            ->first();
        // dd($penduduk);
        // if(!$penduduk){
        //     dd('kontol');
        // } else {
        //     dd($penduduk);
        // }

        $bansos = new Bansos();
        $bansos->id_penduduk = $penduduk->id_penduduk;
        $bansos->pendapatan = $validatedData['pendapatan'];
        $bansos->tanggungan = $validatedData['tanggungan'];
        $bansos->pbb = $validatedData['pbb'];
        $bansos->tagihanAir = $validatedData['tagAir'];
        $bansos->tagihanListrik = $validatedData['tagListrik'];
        $bansos->status = 'Pending_RW';
        $bansos->save();

        return redirect()->route('dataBansos.index')->with('success', 'Pengajuan bantuan sosial berhasil diajukan.');
    }
}
