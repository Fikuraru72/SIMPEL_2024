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
                'subjek' => 'Lampu Jalan',
                'pesan' => 'Lampu jalan di depan rumah saya rusak.',
                'rt' => '01',

            ],
            [
                'subjek' => 'Jalan Berlubang',
                'pesan' => 'Ada jalan berlubang di sekitar komplek.',
                'rt' => '02',

            ],
        ]);
    }
}
