<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Bansos;
use App\Models\Penduduk;

class BansosTableSeeder extends Seeder
{
    public function run()
    {
        Bansos::factory()->count(20)->create();
    }
}
