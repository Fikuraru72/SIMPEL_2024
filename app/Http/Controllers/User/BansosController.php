<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bansos;
use Illuminate\Support\Facades\Auth;

class BansosController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Pengajuan Bantuan Sosial',
            'list'  => ['Beranda', 'Pengajuan Bantuan Sosial']
        ];

        $user = Auth::user();
        $bansos = Bansos::with('penduduk')
            ->where('id_penduduk', $user->id_penduduk)
            ->get();

        return view('user.bansos.index', compact('breadcrumb', 'bansos'));
    }

    public function detail($id_alternatif)
    {
        $breadcrumb = (object) [
            'title' => 'Detail Pengajuan Bantuan Sosial',
            'list'  => ['Beranda', 'Pengajuan Bantuan Sosial', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Pengajuan Bantuan Sosial'
        ];

        $bansoso = Bansos::with('penduduk')->where('id_alternatif', $id_alternatif)->first();

        if (!$bansoso) {
            return redirect()->route('bansos.index')->with('error', 'Data tidak ditemukan.');
        }

        return view('user.bansos.detail', compact('breadcrumb', 'page', 'bansoso'));
    }

    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'pendapatan' => 'required|integer',
            'tanggungan' => 'required|integer',
            'pbb' => 'required|integer',
            'tagAir' => 'required|integer',
            'tagListrik' => 'required|integer',
        ]);

        $user = Auth::user();

        $bansos = new Bansos();
        $bansos->id_penduduk = $user->id_penduduk;
        $bansos->pendapatan = $validatedData['pendapatan'];
        $bansos->tanggungan = $validatedData['tanggungan'];
        $bansos->pbb = $validatedData['pbb'];
        $bansos->tag_air = $validatedData['tagAir'];
        $bansos->tag_listrik = $validatedData['tagListrik'];
        $bansos->status = 'belum terkonfirmasi';
        $bansos->save();

        return redirect()->route('bansos.index')->with('success', 'Pengajuan bantuan sosial berhasil diajukan.');
    }
}
