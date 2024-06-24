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
                'subjek' => 'Lampu jalan',
                'pesan' => 'Lampu jalan di rt 1 rusak parah runtuh.',
                'rt' => '1',

            ],
            [
                'subjek' => 'Jalan Berlubang',
                'pesan' => 'Ada jalan berlubang di sekitar komplek.',
                'rt' => '2',

            ],
        ]);
    }
}
