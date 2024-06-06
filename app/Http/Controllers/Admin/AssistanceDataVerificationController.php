<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bansos;


class AssistanceDataVerificationController extends Controller
{
    public function index (){
        $breadcrumb = (object) [
            'title' => 'Welcome Back at SIMPEL',
            'list' => ['Home','Dashboard']
        ];

        $dataAssitance = Bansos::with('penduduk')
        ->where('status', 'Pending_RW')
        ->select('bansos.*')
        ->get();

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


}
