<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BansosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('bansos')->insert([
            [
                'pendapatan' => '1',
                'tanggungan' => '1',
                'pbb' => '1',
                'tagihanAir' => '1',
                'tagihanListrik' => '1',
                'status' => 'belum terkonfirmasi',
                'id_penduduk' => 1, // Pastikan id_penduduk ini sesuai dengan yang ada di tabel penduduk
            ],
            [
                'pendapatan' => '2',
                'tanggungan' => '2',
                'pbb' => '2',
                'tagihanAir' => '2',
                'tagihanListrik' => '2',
                'status' => 'terkonfirmasi',
                'id_penduduk' => 2, // Pastikan id_penduduk ini sesuai dengan yang ada di tabel penduduk
            ],
            [
                'pendapatan' => '3',
                'tanggungan' => '3',
                'pbb' => '3',
                'tagihanAir' => '3',
                'tagihanListrik' => '3',
                'status' => 'belum terkonfirmasi',
                'id_penduduk' => 3, // Pastikan id_penduduk ini sesuai dengan yang ada di tabel penduduk
            ],
        ]);
    }
}
