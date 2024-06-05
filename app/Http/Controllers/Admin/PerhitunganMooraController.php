<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bansos;
use App\Models\HasilAkhirMoora;
use App\Models\Kriteria;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PerhitunganMooraController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Welcome Back at SIMPEL',
            'list' => ['Home', 'Perhitungan Moora']
        ];

        $bansos = Bansos::all();
        $kriteria = Kriteria::pluck('bobot', 'kriteria');

        $akar = $this->hitungAkar($bansos);
        $normalisasiMatriks = $this->hitungNormalisasiMatriks($bansos, $akar);
        $matriksNormalisasiTertimbang = $this->hitungMatriksNormalisasiTertimbang($normalisasiMatriks, $kriteria);
        $ranking = $this->hitungRanking($matriksNormalisasiTertimbang);

        return view('admin.moora.index', [
            'breadcrumb'                    => $breadcrumb,
            'bansos'                        => $bansos,
            'kriteria'                      => $kriteria,
            'normalisasiMatriks'            => $normalisasiMatriks,
            'matriksNormalisasiTertimbang'  => $matriksNormalisasiTertimbang,
            'ranking'                       => $ranking,
        ]);
    }

    public function store(Request $request)
    {
        $bansos = Bansos::all();
        $kriteria = Kriteria::pluck('bobot', 'kriteria');

        $akar = $this->hitungAkar($bansos);
        $normalisasiMatriks = $this->hitungNormalisasiMatriks($bansos, $akar);
        $matriksNormalisasiTertimbang = $this->hitungMatriksNormalisasiTertimbang($normalisasiMatriks, $kriteria);
        $ranking = $this->hitungRanking($matriksNormalisasiTertimbang);

        $maxKode = HasilAkhirMoora::max('kode');

        if ($maxKode) {
            $urutan = (int) substr($maxKode, 1, 3);
            $urutan++;
        } else {
            $urutan = 1;
        }

        $kodebarang = 'k' . sprintf('%03s', $urutan);

        $currentTime = Carbon::now()->toDateTimeString();

        foreach ($ranking as $item) {
            $hasilPerankingan = new HasilAkhirMoora();
            $hasilPerankingan->kode = $kodebarang;
            $hasilPerankingan->NIK = $item['NIK'];
            $hasilPerankingan->nama = $item['Nama'];
            $hasilPerankingan->total = $item['Total'];
            $hasilPerankingan->ranking = $item['Ranking'];
            $hasilPerankingan->tanggal = $currentTime;
            $hasilPerankingan->save();
        }

        session()->flash('success', 'Data berhasil ditambahkan');
        return redirect()->route('admin.moora.index');
    }

    private function hitungAkar($bansos)
    {
        $pembagi = [
            'pendapatan' => 0,
            'tanggungan' => 0,
            'pbb' => 0,
            'tagihanAir' => 0,
            'tagihanListrik' => 0,
        ];

        foreach ($bansos as $items) {
            $pembagi['pendapatan'] += pow($items->pendapatan, 2);
            $pembagi['tanggungan'] += pow($items->tanggungan, 2);
            $pembagi['pbb'] += pow($items->pbb, 2);
            $pembagi['tagihanAir'] += pow($items->tagihanAir, 2);
            $pembagi['tagihanListrik'] += pow($items->tagihanListrik, 2);
        }

        return [
            'pendapatan' => sqrt($pembagi['pendapatan']),
            'tanggungan' => sqrt($pembagi['tanggungan']),
            'pbb' => sqrt($pembagi['pbb']),
            'tagihanAir' => sqrt($pembagi['tagihanAir']),
            'tagihanListrik' => sqrt($pembagi['tagihanListrik']),
        ];
    }

    private function hitungNormalisasiMatriks($bansos, $akar)
    {
        $normalisasiMatriks = [];

        foreach ($bansos as $items) {
            $normalisasiMatriks[] = [
                'NIK' => $items->penduduk->NIK,
                'Nama' => $items->penduduk->nama,
                'Pendapatan' => round($items->pendapatan / $akar['pendapatan'], 3),
                'Tanggungan' => round($items->tanggungan / $akar['tanggungan'], 3),
                'PBB' => round($items->pbb / $akar['pbb'], 3),
                'TagihanAir' => round($items->tagihanAir / $akar['tagihanAir'], 3),
                'TagihanListrik' => round($items->tagihanListrik / $akar['tagihanListrik'], 3),
            ];
        }

        return $normalisasiMatriks;
    }

    private function hitungMatriksNormalisasiTertimbang($normalisasiMatriks, $kriteria)
    {
        $matriksNormalisasiTertimbang = [];

        foreach ($normalisasiMatriks as $items) {
            $matriksNormalisasiTertimbang[] = [
                'NIK' => $items['NIK'],
                'Nama' => $items['Nama'],
                'Pendapatan' => round($items['Pendapatan'] * $kriteria['Pendapatan Keluarga'], 3),
                'Tanggungan' => round($items['Tanggungan'] * $kriteria['Tanggungan'], 3),
                'PBB' => round($items['PBB'] * $kriteria['PBB'], 3),
                'TagihanAir' => round($items['TagihanAir'] * $kriteria['Tagihan Air'], 3),
                'TagihanListrik' => round($items['TagihanListrik'] * $kriteria['Tagihan Listrik'], 3),
            ];
        }

        return $matriksNormalisasiTertimbang;
    }

    private function hitungRanking($matriksNormalisasiTertimbang)
    {
        $ranking = [];

        foreach ($matriksNormalisasiTertimbang as $items) {
            $total = $items['Pendapatan'] + $items['Tanggungan'] + $items['PBB'] + $items['TagihanAir'] + $items['TagihanListrik'];
            $ranking[] = [
                'NIK' => $items['NIK'],
                'Nama' => $items['Nama'],
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
