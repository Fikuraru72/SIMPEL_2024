<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\Penduduk;
use App\Models\Status;

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
            'JenisKelamin',
            'rt',
            'Alamat',
        );

        return DataTables::of($dataPopulation)
            ->addIndexColumn()
            // ->editColumn('aksi', function ($data) {
            //     return '<a href="' . route('penduduk.edit', $data->NIK) . '">Edit</a> <a href="' . route('penduduk.destroy', $data->id_penduduk) . '" onclick="return confirm(\'Apakah anda yakin?\')">Hapus</a>';
            // })
            ->addColumn('status_nikah', function ($data) {
                return $data->status ? $data->status->status_nikah : ' - ';
            })
            // ->rawColumns(['rt'])
            ->make(true);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|string|unique:penduduk,nik',
            'no_kk' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string',
            'gender' => 'required|string',
            'status_nikah' => 'required|string',
            'status_keluarga' => 'required|string',
            'rt' => 'required|integer',
            'alamat' => 'required|string',
        ]);


        DB::beginTransaction();

        try {
            // Simpan data ke tabel 'penduduk'
            $penduduk = Penduduk::create([
                'nama' => $validatedData['nama'],
                'NIK' => $validatedData['nik'],
                'NoKK' => $validatedData['no_kk'],
                'TTL' => $validatedData['tanggal_lahir'],
                'Agama' => $validatedData['agama'],
                'JenisKelamin' => $validatedData['gender'],
                'rt' => $validatedData['rt'],
                'Alamat' => $validatedData['alamat'],
            ]);

            // Simpan data ke tabel 'status'
            Status::create([
                'id_penduduk' => $penduduk->id_penduduk, // Menggunakan id dari penduduk yang baru saja dibuat
                'status_nikah' => $validatedData['status_nikah'],
                'status_keluarga' => $validatedData['status_keluarga'],
            ]);

            // Commit transaksi jika semua operasi berhasil
            DB::commit();

            // Redirect ke halaman yang sesuai setelah berhasil menyimpan data
            return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil disimpan.');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();

            // Redirect ke halaman yang sesuai dengan pesan kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan. Data penduduk gagal disimpan.');
        }



    }
        // Validasi data yang masuk



}
