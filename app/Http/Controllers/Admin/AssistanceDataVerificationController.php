<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bansos;
use Illuminate\Support\Facades\Auth;


class AssistanceDataVerificationController extends Controller
{
    public function index (){
        $breadcrumb = (object) [
            'title' => 'Welcome Back at SIMPEL',
            'list' => ['Home','Dashboard']
        ];

        if (Auth::user()->level == 'admin') {

            $dataAssitance = Bansos::with('penduduk')
            ->where('status', 'Pending_RW')
            ->select('bansos.*')
            ->get();
        } else {
            $rt = Auth::user()->level;

            $dataAssitance = Bansos::with('penduduk')
                ->where('status', 'Pending_RT')
                ->whereHas('penduduk', function ($query) use ($rt) {
                    $query->where('rt', $rt);
                })
                ->select('bansos.*')
                ->get();
        }

        return view('admin.assistanceDataVerification.index', ['breadcrumb' => $breadcrumb, 'dataAssitance' => $dataAssitance ]);
    }

    public function detail($id)
    {
        $data = Bansos::with('penduduk')
            ->where('id_alternatif', $id)
            ->where('status', 'Pending_RW')
            ->first();

        return response()->json($data);
    }

    public function konfirmasi($id) {
        try {
            $bansos = Bansos::findOrFail($id);
            $bansos->status = 'terkonfirmasi';
            $bansos->save();

            return response()->json(['message' => 'Data berhasil dikonfirmasi',], 200,);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengkonfirmasi data: ' . $e->getMessage()], 500);
        }
    }

    public function tolak($id) {
        try {
            $bansos = Bansos::findOrFail($id);
            $bansos->status = 'Ditolak';
            $bansos->save();

            // return response()->json(['message' => 'Data berhasil dikonfirmasi',], 200,);
            return redirect('/verifikasiBansos');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengkonfirmasi data: ' . $e->getMessage()], 500);
        }
    }


}
