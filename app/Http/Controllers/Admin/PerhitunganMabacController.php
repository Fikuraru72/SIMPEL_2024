<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bansos;
use App\Models\HasilAkhirMabac;
use App\Models\Kriteria;
use App\Models\NilaiMabac;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerhitunganMabacController extends Controller
{

    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Welcome Back at SIMPLE',
            'list'  => ['Home', 'Perhitungan Mabac']
        ];

        $bansos = Bansos::all();
        $kriteria = Kriteria::pluck('bobot', 'kriteria');

        $dataTernormalisasi = $this->normalisasiMatriks($bansos);
        $dataTerbobot = $this->bobotKeputusan($dataTernormalisasi, $kriteria);
        $perkalian = $this->hitungPerkalian($dataTerbobot, $bansos);
        $dataNilaiBatas = $this->nilaiBatas($perkalian, $bansos);
        $nilaiBatas = $this->nilaiBatas($perkalian, $bansos);
        $dataMatriksJarak = $this->matriksJarak($dataTerbobot, $nilaiBatas);
        $ranking = $this->hitungRanking($dataMatriksJarak);

        return view('admin.mabac.index', [
            'breadcrumb'    => $breadcrumb,
            'bansos'        => $bansos,
            'kriteria'      => $kriteria,
            'dataTernormalisasi' => $dataTernormalisasi,
            'dataTerbobot'  => $dataTerbobot,
            'perkalian'     => $perkalian,
            'dataNilaiBatas' => $dataNilaiBatas,
            'nilaiBatas'    => $nilaiBatas,
            'dataMatriksJarak' => $dataMatriksJarak,
            'ranking'       => $ranking,
        ]);
    }

    public function store(Request $request)
    {
        $bansos = Bansos::all();
        $kriteria = Kriteria::pluck('bobot', 'kriteria');

        $dataTernormalisasi = $this->normalisasiMatriks($bansos);
        $dataTerbobot = $this->bobotKeputusan($dataTernormalisasi, $kriteria);
        $perkalian = $this->hitungPerkalian($dataTerbobot, $bansos);
        $dataNilaiBatas = $this->nilaiBatas($perkalian, $bansos);
        $nilaiBatas = $this->nilaiBatas($perkalian, $bansos);
        $dataMatriksJarak = $this->matriksJarak($dataTerbobot, $nilaiBatas);
        $ranking = $this->hitungRanking($dataMatriksJarak);

        // Mengambil data dengan kode paling besar
        $maxKode = HasilAkhirMabac::max('kode');

        if ($maxKode) {
            $urutan = (int) substr($maxKode, 1, 3); // Mengambil angka dari kode terbesar
            $urutan++;
        } else {
            $urutan = 1; // Jika tidak ada data, mulai dari 1
        }

        $kodebarang = 'k' . sprintf('%03s', $urutan); // Membentuk kode baru

        $currentTime = Carbon::now()->toDateTimeString();
        // Simpan hasil perankingan bersama dengan tanggal saat ini
        foreach ($ranking as $item) {
            $hasilPerankingan = new HasilAkhirMabac();
            $hasilPerankingan->kode = $kodebarang;
            $hasilPerankingan->NIK = $item['NIK'];
            $hasilPerankingan->nama = $item['Nama'];
            $hasilPerankingan->total = $item['Total'];
            $hasilPerankingan->ranking = $item['Ranking'];
            $hasilPerankingan->tanggal = $currentTime; // Menyimpan tanggal saat ini
            $hasilPerankingan->save();
        }

        session()->flash('success', 'Data berhasil ditambahkan');
        return redirect()->route('admin.mabac.index');
    }


    private function normalisasiMatriks($bansos)
    {
        $nilaiMax = $this->getNilaiMax();
        $nilaiMin = $this->getNilaiMin();
        $dataTernormalisasi = [];

        foreach ($bansos as $item) {
            $pendapatanNormalisasi = round(($item->pendapatan - $nilaiMin['pendapatan']) / ($nilaiMax['pendapatan'] - $nilaiMin['pendapatan']), 3);
            $tanggunganNormalisasi = round(($item->tanggungan - $nilaiMin['tanggungan']) / ($nilaiMax['tanggungan'] - $nilaiMin['tanggungan']), 3);
            $pbbNormalisasi = round(($item->pbb - $nilaiMin['pbb']) / ($nilaiMax['pbb'] - $nilaiMin['pbb']), 3);
            $tagihanAirNormalisasi = round(($item->tagihanAir - $nilaiMin['tagihanAir']) / ($nilaiMax['tagihanAir'] - $nilaiMin['tagihanAir']), 3);
            $tagihanListrikNormalisasi = round(($item->tagihanListrik - $nilaiMin['tagihanListrik']) / ($nilaiMax['tagihanListrik'] - $nilaiMin['tagihanListrik']), 3);

            $dataTernormalisasi[] = [
                'NIK' => $item->penduduk->NIK,
                'Nama' => $item->penduduk->nama,
                'Pendapatan' => $pendapatanNormalisasi,
                'Tanggungan' => $tanggunganNormalisasi,
                'PBB' => $pbbNormalisasi,
                'TagihanAir' => $tagihanAirNormalisasi,
                'TagihanListrik' => $tagihanListrikNormalisasi,
            ];
        }


        return $dataTernormalisasi;
    }

    private function getNilaiMax()
    {
        return [
            'pendapatan' => Bansos::max('pendapatan'),
            'tanggungan' => Bansos::max('tanggungan'),
            'pbb' => Bansos::max('pbb'),
            'tagihanAir' => Bansos::max('tagihanAir'),
            'tagihanListrik' => Bansos::max('tagihanListrik'),
        ];
    }

    private function getNilaiMin()
    {
        return [
            'pendapatan' => Bansos::min('pendapatan'),
            'tanggungan' => Bansos::min('tanggungan'),
            'pbb' => Bansos::min('pbb'),
            'tagihanAir' => Bansos::min('tagihanAir'),
            'tagihanListrik' => Bansos::min('tagihanListrik'),
        ];
    }

    private function bobotKeputusan($dataTernormalisasi, $kriteria)
    {
        $dataTerbobot = [];

        foreach ($dataTernormalisasi as $item) {
            $dataTerbobot[] = [
                'NIK' => $item['NIK'],
                'Nama' => $item['Nama'],
                'Pendapatan' => round(($kriteria['Pendapatan Keluarga'] * $item['Pendapatan']) + $kriteria['Pendapatan Keluarga'], 3),
                'Tanggungan' => round(($kriteria['Tanggungan'] * $item['Tanggungan']) + $kriteria['Tanggungan'], 3),
                'PBB' => round(($kriteria['PBB'] * $item['PBB']) + $kriteria['PBB'], 3),
                'TagihanAir' => round(($kriteria['Tagihan Air'] * $item['TagihanAir']) + $kriteria['Tagihan Air'], 3),
                'TagihanListrik' => round(($kriteria['Tagihan Listrik'] * $item['TagihanListrik']) + $kriteria['Tagihan Listrik'], 3)
            ];
        }

        return $dataTerbobot;
    }

    private function hitungPerkalian($dataTerbobot)
    {
        $perkalian = [
            'pendapatan' => 1,
            'tanggungan' => 1,
            'pbb' => 1,
            'tagihanAir' => 1,
            'tagihanListrik' => 1,
        ];

        foreach ($dataTerbobot as $item) {
            $perkalian['pendapatan'] *= $item['Pendapatan'];
            $perkalian['tanggungan'] *= $item['Tanggungan'];
            $perkalian['pbb'] *= $item['PBB'];
            $perkalian['tagihanAir'] *= $item['TagihanAir'];
            $perkalian['tagihanListrik'] *= $item['TagihanListrik'];
        }

        return $perkalian;
    }

    private function nilaiBatas($perkalian, $bansos)
    {
        $jumlahBansos = count($bansos);

        $nilaiBatas = [
            'Pendapatan' => round(pow($perkalian['pendapatan'], 1 / $jumlahBansos), 3),
            'Tanggungan' => round(pow($perkalian['tanggungan'], 1 / $jumlahBansos), 3),
            'PBB' => round(pow($perkalian['pbb'], 1 / $jumlahBansos), 3),
            'TagihanAir' => round(pow($perkalian['tagihanAir'], 1 / $jumlahBansos), 3),
            'TagihanListrik' => round(pow($perkalian['tagihanListrik'], 1 / $jumlahBansos), 3),
        ];

        return $nilaiBatas;
    }

    private function matriksJarak($dataTerbobot, $nilaiBatas)
    {
        $dataMatriksJarak = [];

        foreach ($dataTerbobot as $item) {
            $dataMatriksJarak[] = [
                'NIK' => $item['NIK'],
                'Nama' => $item['Nama'],
                'Pendapatan' => round($item['Pendapatan'] - $nilaiBatas['Pendapatan'], 3),
                'Tanggungan' => round($item['Tanggungan'] - $nilaiBatas['Tanggungan'], 3),
                'PBB' => round($item['PBB'] - $nilaiBatas['PBB'], 3),
                'TagihanAir' => round($item['TagihanAir'] - $nilaiBatas['TagihanAir'], 3),
                'TagihanListrik' => round($item['TagihanListrik'] - $nilaiBatas['TagihanListrik'], 3),
            ];
        }

        return $dataMatriksJarak;
    }

    private function hitungRanking($dataMatriksJarak)
    {
        $ranking = [];

        foreach ($dataMatriksJarak as $item) {
            $total = $item['Pendapatan'] + $item['Tanggungan'] + $item['PBB'] + $item['TagihanAir'] + $item['TagihanListrik'];
            $ranking[] = [
                'NIK' => $item['NIK'],
                'Nama' => $item['Nama'],
                'Total' => round($total, 3)
            ];
        }

        usort($ranking, function ($a, $b) {
            return $b['Total'] <=> $a['Total'];
        });

        foreach ($ranking as $index => &$item) {
            $item['Ranking'] = $index + 1;
        }

        return $ranking;
    }
}
