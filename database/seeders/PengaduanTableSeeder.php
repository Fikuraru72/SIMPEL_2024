<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengaduanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengaduan')->insert([
            [
                'nama' => 'John Doe',
                'nik' => '1234567890123456',
                'pesan' => 'Lampu jalan di depan rumah saya rusak.',
                'rt' => '01',

            ],
            [
                'nama' => 'Jane Smith',
                'nik' => '2345678901234567',
                'pesan' => 'Ada jalan berlubang di sekitar komplek.',
                'rt' => '02',

            ],
        ]);
    }
}
