<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\Penduduk;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;


class PopulationController extends Controller
{
    public function index (){
        $breadcrumb = (object) [
            // 'title' => 'Welcome Back at SIMPEL',
            'list' => ['Data Penduduk']
        ];

        $dataPopulation = Penduduk::all();
        // dd(Auth::user());
        return view('admin.population.index', ['breadcrumb' => $breadcrumb, 'dataPopulation' => $dataPopulation]);
    }

    public function list(Request $request)
    {
        if (Auth::user()->level == 'admin') {
            $dataPopulation = Penduduk::with('user', 'status')
                ->whereHas('status', function ($query) {
                    $query->whereNotIn('status_warga', ['Meninggal', 'Pindah']);
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

            $dataPopulation = Penduduk::with('user', 'status')
                ->whereHas('status', function ($query) {
                    $query->whereNotIn('status_warga', ['Meninggal', 'Pindah']);
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


        return DataTables::of($dataPopulation)
            ->addIndexColumn()
            ->editColumn('aksi', function ($data) {
                $btn = '<button type="button" class="btn btn-rounded btn-info confirmation py-2 detail" data-toggle="modal"
                        data-target="#modal-detail" data-id="'.$data->id_penduduk.'"> Detail </button>';
                $btn2 = '<button type="button" class="btn btn-rounded btn-warning confirmation py-2 mx-1 edit" data-toggle="modal"
                        data-target="#modal-edit" data-id="'.$data->id_penduduk.'"> Edit </button>';
                return $btn . $btn2;
            })

            ->addColumn('status_warga', function ($data) {
                return $data->status ? $data->status->status_warga : ' - ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function show($id)
    {
        $data = Penduduk::with('status')
            ->where('id_penduduk', $id)
            ->first();

        return response()->json($data);
    }

    public function edit($id)
    {
        // dd('kontol');
        $data = Penduduk::with('status')
            ->where('id_penduduk', $id)
            ->first();

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'NIK' => 'required',
            'nama' => 'required',
            'NoKK' => 'required',
            'TTL' => 'required',
            'Agama' => 'required',
            'JenisKelamin' => 'required',
            'rt' => 'required',
            'Alamat' => 'required',
            'status_warga' => 'required',
            'status_nikah' => 'required',
        ]);

        // Update data Penduduk
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->update($request->all());


        // Update data Status
        $status = Status::where('id_penduduk', $penduduk->id_penduduk)->first();
        if (!$status) {
            $status = new Status();
            $status->id_penduduk = $penduduk->id_penduduk;
        }
        $status->status_warga = $request->status_warga;
        $status->status_nikah = $request->status_nikah;
        $status->status_keluarga = $request->status_keluarga;
        $status->save();

        // Redirect atau respons berhasil
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
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
