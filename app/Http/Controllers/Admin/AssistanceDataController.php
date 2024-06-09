<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Bansos;
use App\Models\HasilAkhirMabac;
use App\Models\User;
use App\Models\Penduduk;
use App\Models\NilaiMabac;
use PDF;


class AssistanceDataController extends Controller
{
    public function index (){
        $breadcrumb = (object) [
            'title' => 'Welcome Back at SIMPEL',
            'list' => ['Home','Dashboard']
        ];

        $data = HasilAkhirMabac::all();

        return view('admin.assistanceData.index', ['breadcrumb' => $breadcrumb, 'data' => $data]);
    }

    public function downloadpdf(){
        $data = HasilAkhirMabac::all();
        $pdf = PDF::loadView('admin.assistanceData.ranking-pdf',compact('data'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->download('Data Penerima Bansos.pdf');
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
            ->editColumn('aksi', function ($data) {
                return '<button href=""type="button" class="btn btn-rounded btn-info confirmation py-2" data-toggle="modal"
                data-target="#modal-detail" data-id="'.$data->id_alternatif.'"> Detail </button>';
            })
            ->addColumn('NoKK', function ($data) {
                return $data->penduduk->NoKK;
            })
            ->addColumn('nama', function ($data) {
                return $data->penduduk->nama;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function show($id)
    {
        $data = Bansos::with('penduduk')
            ->where('id_alternatif', $id)
            ->first();
        return response()->json($data);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nik' => 'required|string|',
            'nokk' => 'required|string',
            'pendapatan' => 'required|integer',
            'tanggungan' => 'required|integer',
            'pbb' => 'required|integer',
            'tagAir' => 'required|integer',
            'tagListrik' => 'required|integer',
        ]);

        $penduduk = Penduduk::where('NIK', $request->nik)
                            ->where('NoKK', $request->nokk)
                            ->first();
            if (!$penduduk) {
                return redirect()->route('dataBansos.index')->with('error', 'Data penduduk tidak ditemukan. Pengajuan bantuan sosial gagal disimpan.');
            }

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
