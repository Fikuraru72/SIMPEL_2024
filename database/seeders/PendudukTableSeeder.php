<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendudukTableSeeder extends Seeder
{
    public function run()
    {
        Penduduk::factory()->count(20)->create();
    }
}
