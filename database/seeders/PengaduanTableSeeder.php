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
                'Subjek' => 'Lampu Jalan Rusak',
                'Isi' => 'Lampu jalan di depan rumah saya rusak.',
                'id_user' => 1,
            ],
            [
                'Subjek' => 'Jalan Berlubang',
                'Isi' => 'Ada jalan berlubang di sekitar komplek.',
                'id_user' => 2,
            ],
        ]);
    }
}
