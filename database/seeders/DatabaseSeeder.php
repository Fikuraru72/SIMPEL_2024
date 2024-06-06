<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penduduk;
use App\Models\Bansos;
use App\Models\Status;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Memanggil factory
        Penduduk::factory()->count(15)->create();
        Bansos::factory()->count(15)->create();
        Status::factory()->count(15)->create();

        // Memanggil seeder lain
        $this->call([
            UsersTableSeeder::class,
            PengaduanTableSeeder::class,
            KriteriaTableSeeder::class,
        ]);
    }
}

