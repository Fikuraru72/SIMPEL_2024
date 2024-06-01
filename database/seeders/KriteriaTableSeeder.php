<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kriteria')->insert([
            [
                'kriteria'      => 'Tanggungan',
                'bobot'         => '0.25',
                'tipe'          => 'Benefit'
            ],
            [
                'kriteria'      => 'Pendapatan Keluarga',
                'bobot'         => '0.25',
                'tipe'          => 'Benefit'
            ],
            [
                'kriteria'      => 'PBB',
                'bobot'         => '0.20',
                'tipe'          => 'Benefit'
            ],
            [
                'kriteria'      => 'Tagihan Air',
                'bobot'         => '0.15',
                'tipe'          => 'Benefit'
            ],
            [
                'kriteria'      => 'Tagihan Listrik',
                'bobot'         => '0.15',
                'tipe'          => 'Benefit'
            ]
        ]);
    }
}
